import moment from 'moment'
import axios from 'axios'

export default {
    methods: {
        ready(e) {
            this.disableDays = [];
            this.calendar_start_date = moment(e.startDate)
            this.calendar_end_date = moment(e.endDate)
            this.disableDays = this.getDaysBetweenDates(moment(e.startDate), moment(e.endDate))
            this.allowedDays = this.getDaysBetweenDates(moment().add(5, 'days'), moment().add(30, 'days'))

            this.actualDays = _.difference(this.disableDays, this.allowedDays);

            if (this.holidays_for_scheduling.length) {
                this.actualDays = this.actualDays.concat(this.holidays_for_scheduling);
            }

        },
        notificationMessage() {
            if (this.loader) {
                this.notification = 'Please wait until the selected date classes have been loaded!'
            } else if (Object.keys(this.error.errors).length) {
                this.notification = 'Please fill in the required fields above'
            } else {
                this.notification = `
                 Please Select any date starting from <br>
                 ${this.filters.date_format(new Date().addDays(5).format())}
                 <br> to ${this.filters.date_format(new Date().addDays(30).format())} only!
                  `;
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
        resetSelectedSlot() {
            this.registration.slot = {
                existing: false,
                slot: '',
                slot_display: '',
                space: '',
                space_count: 0,
                taskclass: { id: 0 },
                teacher: { id: 0 }
            }
        },
        reloadData() {
            if (this.registration.topic_id && this.registration.location_id && this.registration.class_type) {
                if (!this.registration.selected_date_raw) {
                    this.nextAvailableDate();
                } else {
                    this.getAvailableTimeSlots();
                }
            }
        },
        nextAvailableDate() {
            let date = new Date().addDays(5).format();
            //add code to externally click the calendar date
            this.registration.selected_date = this.filters.date_format(date);
            this.registration.selected_date_raw = date
            this.available_time_slots = '';
            this.getAvailableTimeSlots()
        },
        handleTopicSelection(topic_id) {
            this.topics.topics.forEach(topic => {
                if (topic_id === topic.id) { this.registration.topic = topic }
            })
            this.registration.location = this.locations.school_location
            this.registration.location_id = this.locations.school_location.id
            this.reloadData();
        },
        submitStepTwo() {
            let _this = this;
            _this.registration.parent.phone = _this.phoneObject;
            if (_this.registration.parent.full_name === '') {
                _this.registration.parent.full_name = _this.registration.student.full_name;
            }
            axios.post('/forms/setTrialFormStepTwoSchools', _this.registration)
                .then(response => {
                    _this.registration.student = response.data.data.student;
                    _this.registration.parent = response.data.data.parent;
                    _this.next();
                });
        },
        selectClassHandler(slot) {
            this.registration.slot = slot;
        },
        dateClicked(e) {
            let current_selected_date = this.registration.selected_date_raw ? this.registration.selected_date_raw : new Date().format();
            this.registration.selected_date_raw = e;
            let enteredDate = new Date(e).format();
            let today = new Date().format()
            let startDate = new Date().addDays(5).format()
            let endDate = new Date().addDays(30).format()
            let endDatePlusOne = new Date().addDays(31).format()
            // checked if date is in the available dates range
            if (!moment(enteredDate).isBetween(today, endDatePlusOne)) {
                this.$store.commit('notifications/code', 404)
                this.$store.commit(
                    'notifications/setMessage',
                    `Select date starting from ${this.filters.date_format(startDate)} to ${this.filters.date_format(endDate)} only!`)
                setTimeout(() => {
                    this.registration.selected_date_raw = current_selected_date;
                }, 300)
                return false;
            }

            if (!this.loader) {
                this.registration.selected_date = this.filters.date_format(e);
                this.registration.selected_date_raw = e
                this.available_time_slots = '';
                this.getAvailableTimeSlots()
            } else {
                this.$store.commit('notifications/code', 404)
                this.$store.commit(
                    'notifications/setMessage',
                    `Please wait until the selected date classes have been loaded!`)
                setTimeout(() => {
                    this.registration.selected_date_raw = current_selected_date;
                }, 300)
            }

        },
        schoolObject() {
            this.registration.student = {
                id: '',
                full_name: '',
                age: '',
                grade: '',
                students: '',
                notes: '',
                dob: '',
                is_school: true,
                postal_address: '',
                homework_type: '',
                homework_types: [],
                additional_email: '',
                additional_phone_number: ''
            }
        },
        parentObject() {
            this.registration.parent = {
                id: '',
                full_name: '',
                dial_code: '',
                phone_number: '',
                email: '',
                country_id: '',
                phone: '',
                additional_email: '',
                additional_phone_number: ''
            }
        },
        addNewStudentHandler() {
            this.registration.addNewStudent = !this.registration.addNewStudent;
            this.existingStudents = [];
            this.registration.student = { id: '', full_name: '', age: '', is_school: true, grade: '', students: '', notes: '', dob: '', postal_address: '', additional_email: '', additional_phone_number: '', homework_type: '', homework_types: [] };
        },
        phoneInput(number, obj) {
            if (obj) {
                this.phoneObject = obj;
                this.registration.parent.phone = obj;
                this.registration.parent.dial_code = obj.countryCallingCode
                this.registration.parent.phone_number = obj.nationalNumber
            }
        },
        onPhoneNumberEnter() {
            this.getExistingSchools();
        },
        back() {
            // if(process.client) { window.location="#freeform" }
            if (typeof window !== 'undefined') {
                window.location = "#freeform";
            }
            this.step > 1 ? this.step-- : ''
        },
        getExistingSchools() {
            let _this = this;
            this.existingStudents = [];
            this.schoolObject();
            if (_this.registration.parent.phone_number != null) {
                _this.registration.parent.phone = _this.phoneObject;
                axios.post('/forms/getExistingSchools', _this.registration)
                    .then(response => {
                        _this.showAddStudentLink = true;
                        _this.existingStudents = response.data.data.students;
                        if (response.data.data.parent) {
                            _this.registration.parent = response.data.data.parent
                        }
                    }).catch(error => {
                        _this.showAddStudentLink = true;
                        _this.addNewStudentHandler();
                    })
            }
        },
        getAvailableTimeSlots() {
            let _this = this;
            _this.resetSelectedSlot();
            _this.available_time_slots = ''
            axios.post('/forms/getAvailableTimeSlots', _this.registration)
                .then(response => {
                    _this.available_time_slots = response.data.data.available_time_slots;
                    _this.flag_to_get_available_call_slots = true;
                }).catch(error => {
                })
        },
        addFreeSession() {
            let _this = this;
            _this.verifyCaptcha().then(res => {
                _this.error = '';
                _this.registration.parent.phone = _this.phoneObject;
                _this.registration.partner_code = _this.partner_code;
                _this.registration.isPaymentSuccess = true;
                axios.post('/forms/storeFreeTrialForSchools', _this.registration)
                    .then(response => {
                        _this.step = _this.step + 1;
                    }).catch(error => {

                    });
            }).catch(err => {

            })
        }
    }
}
