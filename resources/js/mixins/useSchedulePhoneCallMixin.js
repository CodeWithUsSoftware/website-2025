// src/mixins/phoneCallMethodsMixin.js
import moment from 'moment'
import axios from 'axios'

export default {
  methods: {
    ready(e) {
      this.disableDays = []
      this.calendar_start_date = moment(e.startDate)
      this.calendar_end_date = moment(e.endDate)
      this.disableDays = this.getDaysBetweenDates(moment(e.startDate), moment(e.endDate))
      this.allowedDays = this.getDaysBetweenDates(moment().add(1, 'days'), moment().add(14, 'days'))

      this.actualDays = _.difference(this.disableDays, this.allowedDays)

      if (this.holidays_for_scheduling.length) {
        this.actualDays = this.actualDays.concat(this.holidays_for_scheduling)
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
          ${this.filters.date_format(new Date().addDays(1).format())}
          <br> to ${this.filters.date_format(new Date().addDays(14).format())} only!`
      }
    },

    getDaysBetweenDates(startDate, endDate) {
      let now = startDate.clone(), dates = []
      while (now.isSameOrBefore(endDate)) {
        dates.push(new Date(now).format())
        now.add(1, 'days')
      }
      return dates
    },

    submitStepTwo() {
      this.phone_call.student.phone = this.phoneObject
      axios.post('/web/submitPhoneCallStepTwo', this.phone_call)
        .then(response => {
          this.phone_call.student = response.data.data.user
          this.phone_call.parent = response.data.data.parent
          this.next()
        }).catch(error => {})
    },

    addNewStudentHandler() {
      this.phone_call.addNewStudent = !this.phone_call.addNewStudent
      this.existingStudents = []
      Object.assign(this.phone_call.student, {
        id: '', full_name: '', age: '', grade: '', dob: '',
        postal_address: '', additional_email: '', additional_phone_number: '',
        homework_type: '', homework_types: []
      })
    },

    getDatesRange(startDate, endDate) {
      let now = startDate.clone(), dates = []
      while (now.isSameOrBefore(endDate)) {
        dates.push(now.format())
        now.add(1, 'days')
      }
      return dates
    },
    function(startDate, endDate) {
      let now = startDate.clone(), dates = [];

      while (now.isSameOrBefore(endDate)) {
        dates.push(now.format('YYYY/MM/DD'));
        now.add(1, 'days');
      }
      return dates;
    },
    phoneInput(number, obj) {
      if (obj) {
        this.phoneObject = obj
        Object.assign(this.phone_call.student, {
          phone: obj,
          dial_code: obj.countryCallingCode,
          phone_number: obj.nationalNumber
        })
      }
    },

    onPhoneNumberEnter() {
      this.getExistingStudents()
    },

    // next() {
    //   if (typeof window !== 'undefined') {
    //     window.location = "#phone-call-mobile"
    //   }
    //   this.step++
    // },

    // back() {
    //   if (typeof window !== 'undefined') {
    //     window.location = "#phone-call-mobile"
    //   }
    //   this.step--
    // },

    next() {
        if (typeof window !== 'undefined') {
            const target = this.isMobile ? "#phone-call-mobile" : "#phone-call";
            window.location = target;
        }
        this.step++;
    },

    back() {
        if (typeof window !== 'undefined') {
            const target = this.isMobile ? "#phone-call-mobile" : "#phone-call";
            window.location = target;
        }
        this.step--;
    },

    dateClicked(e) {
      if (this.dateIsInAvailableRange(e) && !this.loader) {
        this.phone_call.selected_date_raw = e
        this.phone_call.selected_date = this.filters.date_format(e)
        this.available_time_slots = []
        this.getAvailablePhoneCallSlots()
      }
    },

    dateIsInAvailableRange(date) {
      let enteredDate = new Date(date).format()
      let today = new Date().format()
      let endDate = new Date().addDays(14).format()
      let endDatePlusOne = new Date().addDays(15).format()

      if (moment(enteredDate).isBetween(today, endDatePlusOne)) {
        return true
      } else {
        this.$store.commit('notifications/code', 404)
        this.$store.commit(
          'notifications/setMessage',
          `Select date between ${this.filters.date_format(today)} and ${this.filters.date_format(endDate)} only!`)
        return false
      }
    },

    reloadData() {
      this.phone_call.selected_date_raw = ''
      this.phone_call.selected_date = ''
      if (this.phone_call.reason) {
        if (!this.phone_call.selected_date_raw) {
          this.nextAvailableDate()
        } else {
          this.getAvailablePhoneCallSlots()
        }
      }
    },

    nextAvailableDate() {
      let date = new Date().addDays(1).format()
      this.phone_call.selected_date = this.filters.date_format(date)
      this.phone_call.selected_date_raw = date
      this.available_time_slots = []
      this.getAvailablePhoneCallSlots()
    },

    selectClassHandler(slot) {
      this.phone_call.slot = slot
    },

    getExistingStudents() {
      this.existingStudents = []
      if (this.phone_call.student.phone_number != null) {
        this.phone_call.student.phone = this.phoneObject
        axios.post('/web/getExistingStudents', this.phone_call)
          .then(response => {
            this.existingStudents = response.data.data.students
            this.showAddStudentLink = true
            if (response.data.data.parent) {
              this.phone_call.student.email = response.data.data.parent.email
              this.phone_call.student.id = response.data.data.parent.id
            }
          }).catch(error => {
            this.showAddStudentLink = true
            this.addNewStudentHandler()
          })
      }
    },

    getAvailablePhoneCallSlots() {
      this.slots_not_available = ''
      axios.post('/web/getAvailablePhoneCallSlots', this.phone_call)
        .then(response => {
          if (response.data.data.available_time_slots) {
            this.available_time_slots = response.data.data.available_time_slots
          } else {
            this.slots_not_available = 'No phone call slots available for today!'
          }
          this.user_time_zone = response.data.data.timezone
        }).catch(error => {
          console.log(error.response)
        })
    },

    bookPhoneCallSlot() {
      this.error = ''
      axios.post('/web/bookPhoneCallSlotByUser', this.phone_call)
        .then(() => {
          this.next();
        }).catch(error => {
          this.error = true
          this.errorMsg = error.response.data.message
        })
    },
  }
}
