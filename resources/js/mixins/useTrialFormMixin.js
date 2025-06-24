import moment from 'moment'
import axios from 'axios'

let stripe = Stripe(
    "pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69"
);

export default {
    methods: {
        notificationMessage() {
            if (this.loader) {
                this.notification =
                    "Please wait until the selected date classes have been loaded!";
            } else if (Object.keys(this.error.errors).length) {
                this.notification = "Please fill in the required fields above";
            } else {
                this.notification = `
             Please Select any date starting from <br>
             ${this.filters.date_format(new Date().addDays(1).format())}
             <br> to ${this.filters.date_format(
                    new Date().addDays(14).format()
                )} only!`;
            }
        },
        ready(e) {
            this.disableDays = [];
            this.calendar_start_date = moment(e.startDate);
            this.calendar_end_date = moment(e.endDate);
            this.disableDays = this.getDaysBetweenDates(
                moment(e.startDate),
                moment(e.endDate)
            );
            this.allowedDays = this.getDaysBetweenDates(
                moment().add(3, "days"),
                moment().add(16, "days")
            );

            this.actualDays = _.difference(this.disableDays, this.allowedDays);

            if (this.holidays_for_scheduling.length) {
                this.actualDays = this.actualDays.concat(
                    this.holidays_for_scheduling
                );
            }
        },
        getDaysBetweenDates(startDate, endDate) {
            let now = startDate.clone(),
                dates = [];
            while (now.isSameOrBefore(endDate)) {
                dates.push(new Date(now).format());
                now.add(1, "days");
            }
            return dates;
        },
        resetSelectedSlot() {
            this.registration.slot = {
                existing: false,
                slot: "",
                slot_display: "",
                space: "",
                space_count: 0,
                taskclass: { id: 0 },
                teacher: { id: 0 },
            };
        },
        reloadData() {
            if (
                this.registration.topic_id &&
                this.registration.location_id &&
                this.registration.class_type
            ) {
                if (!this.registration.selected_date_raw) {
                    this.nextAvailableDate();
                } else {
                    this.getAvailableTimeSlots();
                }
            }
        },
        nextAvailableDate() {
            let date = new Date().addDays(3).format();
            this.registration.selected_date = this.filters.date_format(date);
            this.registration.selected_date_raw = date;
            this.available_time_slots = "";
            this.getAvailableTimeSlots();
        },
        handleTopicSelection(topic_id) {
            //console.log(topic_id);
            this.topics.topics.forEach((topic) => {
                if (topic_id === topic.id) {
                    this.registration.topic = topic;
                }
            });
            this.reloadData();
        },
        handleLocationSelection(location_id) {
            this.locations.locations.forEach((location) => {
                if (location_id === location.id) {
                    this.registration.location = location;
                }
            });
            this.reloadData();
        },
        selectClassHandler(slot) {
            this.registration.slot = slot;
        },
        dateClicked(e) {
            let current_selected_date = this.registration.selected_date_raw
                ? this.registration.selected_date_raw
                : new Date().format();
            this.registration.selected_date_raw = e;
            let enteredDate = new Date(e).format();
            let today = new Date().addDays(1).format();
            let startDate = new Date().addDays(1).format();
            let endDate = new Date().addDays(14).format();
            let endDatePlusOne = new Date().addDays(15).format();

            //   console.log(current_selected_date,this.registration.selected_date_raw,enteredDate,today,startDate,endDate,endDatePlusOne);
            // console.log(enteredDate,today,endDatePlusOne,moment(enteredDate).isBetween(today, endDatePlusOne));

            if (!moment(enteredDate).isBetween(today, endDatePlusOne)) {
                this.$store.commit("notifications/code", 404);
                this.$store.commit(
                    "notifications/setMessage",
                    `Select date starting from ${this.filters.date_format(
                        startDate
                    )} to ${this.filters.date_format(endDate)} only!`
                );
                setTimeout(() => {
                    this.registration.selected_date_raw = current_selected_date;
                }, 300);
                return false;
            }

            if (!this.loader) {
                this.registration.selected_date = this.filters.date_format(e);
                this.registration.selected_date_raw = e;
                this.available_time_slots = "";
                // console.log(this.registration.selected_date,this.registration.selected_date_raw);
                this.getAvailableTimeSlots();
            } else {
                this.$store.commit("notifications/code", 404);
                this.$store.commit(
                    "notifications/setMessage",
                    `Please wait until the selected date classes have been loaded!`
                );
                setTimeout(() => {
                    this.registration.selected_date_raw = current_selected_date;
                }, 300);
            }
        },
        studentObject() {
            this.registration.student = {
                id: "",
                full_name: "",
                age: "",
                grade: "",
                dob: "",
                postal_address: "",
                homework_type: "",
                homework_types: [],
                additional_email: "",
                additional_phone_number: "",
            };
        },
        parentObject() {
            this.registration.parent = {
                id: "",
                full_name: "",
                dial_code: "",
                phone_number: "",
                email: "",
                country_id: "",
                phone: "",
                additional_email: "",
                additional_phone_number: "",
            };
        },
        handleStudentSelection() {
            // Reset the addNewStudent flag when an existing student is selected
            this.registration.addNewStudent = false;
        },
        addNewStudentHandler() {
            this.registration.addNewStudent = true;
            this.existingStudents = [];
            this.registration.student = {
                id: "",
                full_name: "",
                age: "",
                grade: "",
                dob: "",
                postal_address: "",
                additional_email: "",
                additional_phone_number: "",
                homework_type: "",
                homework_types: [],
            };
        },
        phoneInput(number, obj) {
            if (obj) {
                this.phoneObject = obj;
                this.registration.parent.phone = obj;
                this.registration.parent.dial_code = obj.countryCallingCode;
                this.registration.parent.phone_number = obj.nationalNumber;
                this.registration.parent.phone_number = obj.nationalNumber;
                this.registration.phone = obj;
            }
        },
        onPhoneNumberEnter() {
            this.getExistingStudents();
        },
        next() {
            //   if(process.client) { window.location="#freeform" }

            if (typeof window !== "undefined") {
                window.location = "#freeform";
            }

            if (this.isMobile) {
                // Handle mobile-specific logic here
                if (this.step === 5 && this.registration.class_type === "group") {
                    // console.log('group session',this.step);
                    this.addFreeSession();
                } else {
                    // console.log('b step',this.step);
                    this.step++;
                    // console.log('a step',this.step);
                }
            }
            else {
                // Handle desktop-specific logic here
                if (this.step === 3 && this.registration.class_type === "group") {
                    this.addFreeSession();
                } else {
                    this.step++;
                }
            }
        },
        back() {
            //   if(process.client) { window.location="#freeform" }
            if (typeof window !== "undefined") {
                window.location = "#freeform";
            }
            this.step > 1 ? this.step-- : "";
        },
        getExistingStudents() {
            let _this = this;
            this.existingStudents = [];
            this.studentObject();
            if (_this.registration.parent.phone_number != null) {
                _this.registration.parent.phone = _this.phoneObject;

                this.studentStore
                    .getExistingStudentsNew(_this.registration)
                    .then((response) => {
                        _this.existingStudents = response.data.students;
                        //console.log(_this.existingStudents.length,_this.existingStudents,response.data.students);
                        if (_this.existingStudents.length > 0) {
                            // console.log('greater',_this.existingStudents.length);
                            _this.showAddStudentLink = true;
                            if (response.data.parent) {
                                _this.registration.parent =
                                    response.data.parent;
                            }
                        } else if (_this.existingStudents.length == 0) {
                            // console.log('equal',_this.existingStudents.length);
                            _this.showAddStudentLink = true;
                            _this.addNewStudentHandler();
                        }
                    });

                // this.studentStore.getExistingStudentsNew(_this.registration).then((response) => {
                //     _this.showAddStudentLink = true;
                //     _this.existingStudents = response.data.students;
                //     console.log(_this.existingStudents.length);
                //     if(response.data.parent)
                //     {
                //         _this.registration.parent = response.data.parent
                //     }
                // }).catch(error => {
                //   _this.showAddStudentLink = true;
                //   _this.addNewStudentHandler();
                // })
            }
        },
        getAvailableTimeSlots() {
            let _this = this;
            _this.resetSelectedSlot();
            _this.available_time_slots = "";
            axios
                .post("/forms/getAvailableTimeSlots", _this.registration)
                .then((response) => {
                    _this.available_time_slots =
                        response.data.data.available_time_slots;
                    _this.flag_to_get_available_call_slots = true;
                })
                .catch((error) => { });
        },
        addFreeSession() {
            let _this = this;
            _this.error = "";
            _this.registration.parent.phone = _this.phoneObject;
            _this.registration.partner_code = _this.partner_code;
            _this.registration.isPaymentSuccess = true;
            return new Promise((resolve, reject) => {
                axios({
                    method: "post",
                    url: "/forms/storeFreeTrial",
                    data: _this.registration,
                })
                    .then((response) => {
                        resolve(response);
                        _this.registration.student.id =
                            response.data.data.user.id;
                        if (_this.registration.class_type === "group") {
                            _this.step = _this.step + 2;
                        }
                    })
                    .catch((error) => {
                        //console.log(error);
                        reject(error);
                    });
            });
        },
        async redirectToCheckout() {
            // console.log('Stripe:', Stripe); // Should not be undefined
            try {
                let fetchSession = "";
                this.next();
                const fetchClientSecret = async () => {
                    this.registration.totalAmount = this.private_session_fee;
                    const response = await axios.post("/forms/checkout", {
                        registration: this.registration,
                        coupon: this.coupons,
                        // plan_id:this.planId,
                        // type:'trial',
                        type: "trial",
                        mode: "trial",
                    });

                    //console.log(response.data.error);
                    if (response.data.error) {
                        this.stripe_error = response.data.error;
                    }

                    console.log("After next(), step is now:", this.step);
                    const clientSecret = response.data.fetchClientSecret;
                    fetchSession = response.data.fetchSession;
                    this.registration.parent = response.data.parent;
                    this.registration.student = response.data.student;
                    return clientSecret;
                };

                const handleComplete = async () => {
                    this.checkout.destroy();
                    await this.checkStatus(fetchSession);
                };

                if (this.checkout) {
                    this.checkout.destroy();
                }

                this.checkout = await stripe.initEmbeddedCheckout({
                    fetchClientSecret,
                    onComplete: handleComplete,
                });

                // Add a small delay to ensure DOM is ready
                // await new Promise(resolve => setTimeout(resolve, 100));

                // Mount Checkout
                console.log(
                    "Attempting to mount to #checkout, element exists:"
                );
                this.checkout.mount("#checkout");
                console.log("Stripe mounted successfully");
            } catch (error) {
                //console.error('Error:', error);
                this.stripe_error = error;
            }
        },
        async checkStatus(sessionId) {
            const response = await axios.post("/forms/check_payment_status", {
                session_id: sessionId,
            });

            if (response.data.error) {
                this.stripe_error = response.data.error;
                return;
            }

            //console.log(response.data,response.data.payment_status);

            if (response.data.payment_status == "open") {
                // window.replace('http://localhost:4242/checkout.html')
            } else if (response.data.payment_status == "complete") {
                this.registration.isPaymentSuccess = true;
                if (!this.registration.selectTaskClassLater) {
                    this.addFreeSession()
                        .then((response) => {
                            this.next();
                        })
                        .catch((error) => {
                            //
                        });
                }
            }
        },
    }
}
