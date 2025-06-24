import moment from 'moment'
import axios from 'axios'

export default {
    methods: {
        notificationMessage() {
            if (this.loader) {
                this.notification = 'Please wait until the selected date classes have been loaded!'
            } else if (Object.keys(this.errors.errors).length) {
                this.notification = 'Please fill in the required fields above'
            } else {
                this.notification = `
                   Please Select any date starting from <br>
                   ${this.filters.date_format(new Date().addDays(1).format())}
                   <br> to ${this.filters.date_format(new Date().addDays(14).format())} only!
                    `;
            }
        },
        testNew(task_class) {
            this.reschedule.selectedClassToReschedule = task_class
            this.reschedule.cancel = false;
            this.step++;
        },
        rescheduleNow(task_class) {
            this.reschedule.cancel = false
            this.reschedule.selectedClassToReschedule = task_class;
        },
        cancelClass(task_class) {
            this.reschedule.selectedClassToReschedule = task_class
            this.reschedule.cancel = true;
            this.step = 5
        },
        resetPassword() {
            let _this = this;
            _this.linkLoader = true;
            _this.loader = true
            axios.post('/web/sendPasswordResetToken', _this.reschedule.student).then(function (response) {
                _this.linkLoader = false
            }).catch(() => {
                _this.linkLoader = true
            })
        },
        resetRescheduleObject() {
            this.reschedule = {
                cancel: false,
                slot: { id: 0 },
                selectedClassToReschedule: '',
                registration_type: 'Reschedule',
                selected_date_raw: '',
                pass_code: '',
                type: '',
                student: {
                    id: 0
                },
                selected_date: '',
                showAllTeacher: false
            },
                this.step_up = true
        },
        ready(e) {
            this.disableDays = [];
            this.calendar_start_date = moment(e.startDate)
            this.calendar_end_date = moment(e.endDate)
            this.disableDays = this.getDaysBetweenDates(moment(e.startDate), moment(e.endDate))
            this.allowedDays = this.getDaysBetweenDates(moment().add(3, 'days'), moment().add(16, 'days'))

            this.actualDays = _.difference(this.disableDays, this.allowedDays);

            if (this.holidays_for_scheduling.length) {
                this.actualDays = this.actualDays.concat(this.holidays_for_scheduling);
            }

        },
        getDaysBetweenDates(startDate, endDate) {
            let now = startDate.clone(), dates = [];
            while (now.isSameOrBefore(endDate)) {
                dates.push(new Date(now).format());
                now.add(1, 'days');
            }
            return dates;
        },
        submitStepOne() {
            let _this = this;

            //console.log(_this);

            if (this.reschedule.type === 'code') {
                axios.get('/web/generateOTP/' + _this.phoneObject.country.iso2 + '/' + _this.student.phone_number)
                    .then(response => {
                    }).catch(error => {
                    })
            }
            _this.reschedule.pass_code = '';
            _this.next();
        },
        next() {
            this.step++;
            if (process.client) { window.location = "#reschedule" }
        },
        back() {
            this.step--;
            if (process.client) { window.location = "#reschedule" }
        },
        resetStudentInfoStep() {
            this.phoneObject = ''
            this.existingStudents = [];
            this.phone = '';
            this.resetRescheduleObject();
        },
        phoneInput(number, obj) {
            if (obj) {
                this.phoneObject = obj;
                this.reschedule.student.phone = obj;
                this.reschedule.student.dial_code = obj.countryCallingCode
                this.reschedule.student.phone_number = obj.nationalNumber
            }
        },
        onPhoneNumberEnter() {
            // this.validatePhoneNumber();
            this.getExistingStudents();
            this.reschedule.student = {
                id: 0
            }
        },
        validatePhoneNumber() {
            // console.log('validatePhoneNumber')
            if (!this.phoneObject.number) {
                this.errorMessage = 'Phone number of required'
                return false;
            }
            if (!this.phoneObject.valid) {
                this.errorMessage = 'Enter a valid phone number'
                return false;
            }
        },
        getExistingStudents() {
            //console.log('getExistingStudents');
            let _this = this;
            this.errorMessage = '';
            this.existingStudents = [];
            if (_this.reschedule.student.phone_number != null) {
                _this.reschedule.student.phone = _this.phoneObject;
                axios.post('/web/getExistingStudents', _this.reschedule)
                    .then(response => {
                        _this.existingStudents = response.data.data.students;
                    }).catch((error) => {
                        _this.errorMessage = error.response.data.message;
                    })
            }
        },
        studentVerification() {
            let _this = this;
            //send request back to server to get the verification of student
            axios.post('/web/verifyPassCode', _this.reschedule)
                .then(response => {
                    _this.getAllPendingMakeUpAbleClasses()
                }).catch(error => {
                    // console.log(error.response.data.message);
                    //_this.errorMessage = error.response.data.message;
                    if (_this.errorMessage == 'code') {
                        this.$store.commit(
                            'notifications/setMessage',
                            'You entered wrong OTP')
                    }
                    else {
                        this.$store.commit(
                            'notifications/setMessage',
                            'You entered wrong password')
                    }

                })
        },
        getAllPendingMakeUpAbleClasses() {
            let _this = this;
            _this.message = '';
            axios({
                method: "POST",
                url: "/web/getAllExistingScheduledClasses",
                data: { student_id: _this.student_id, task_class_id: _this.task_class_id },
            }).then(response => {
                _this.tasks_classes = response.data.tasks_classes;
                _this.next();
            })
        },
        dateClicked(e) {
            let current_selected_date = this.reschedule.selected_date_raw ? this.reschedule.selected_date_raw : new Date().format();
            this.reschedule.selected_date_raw = e;
            let enteredDate = new Date(e).format();
            this.reschedule.selected_date = enteredDate;
            let today = new Date().addDays(1).format()
            let startDate = new Date().addDays(1).format()
            let endDate = new Date().addDays(14).format()
            let endDatePlusOne = new Date().addDays(15).format()
            // checked if date is in the available dates range
            if (!moment(enteredDate).isBetween(today, endDatePlusOne)) {
                this.$store.commit('notifications/code', 404)
                this.$store.commit(
                    'notifications/setMessage',
                    `Select date starting from ${this.filters.date_format(startDate)} to ${this.filters.date_format(endDate)} only!`)
                setTimeout(() => {
                    this.reschedule.selected_date_raw = current_selected_date;
                }, 300)
                return false;
            }

            if (!this.loader) {
                this.reschedule.selected_date = this.filters.date_format(e);
                this.reschedule.selected_date_raw = e
                this.available_time_slots = '';
                this.getAvailableTaskClasses()
            } else {
                this.$store.commit('notifications/code', 404)
                this.$store.commit(
                    'notifications/setMessage',
                    `Please wait until the selected date classes have been loaded!`)
                setTimeout(() => {
                    this.reschedule.selected_date_raw = current_selected_date;
                }, 300)
            }

        },
        handleChangeInTeacher() {
            if (this.reschedule.selected_date) {
                this.getAvailableTaskClasses();
            }
        },
        getAvailableTaskClasses() {
            let _this = this;
            _this.available_time_slots = '';
            _this.reschedule.slot = { id: 0 };
            _this.loader = true;
            axios({
                method: "POST",
                url: '/web/getAvailableTaskClassesNew',
                data: {
                    'student_id': _this.reschedule.student.id,
                    'task_class_id': _this.reschedule.selectedClassToReschedule.id,
                    'selected_date': _this.reschedule.selected_date,
                    'show_all_teachers': _this.reschedule.showAllTeacher,
                }
            }).then(response => {
                _this.available_time_slots = response.data.data.available_time_slots;
                _this.loader = false;
            }).catch(response => {
                _this.loader = false;
            })
        },
        selectClassHandler(slot) {
            this.reschedule.slot = slot;
        },
        rescheduleClass() {
            let _this = this;
            axios({
                method: "POST",
                url: '/web/rescheduleClassNew',
                data: {
                    reschedule: _this.reschedule,
                    time_zone: _this.timezone,
                    loaction: _this.locations
                }
            }).then(response => {
                _this.reschedule.location = response.data.task_class.location;
                console.log(response.data.task_class.location);
                _this.next();
                _this.loader = false;
            }).catch(response => {
                _this.loader = false;
            })
          }
    }
}
