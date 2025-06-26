import moment from 'moment'
import axios from 'axios'

let stripe = Stripe(
    "pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69"
);

export default {
    methods: {
        notificationMessage() {
            if (this.loader) {
                this.notification = 'Please wait until the selected date classes have been loaded!'
            } else if (Object.keys(this.errors.errors).length) {
                this.notification = 'Please fill in the required fields above'
            } else {
                this.notification = `Please Select any date starting from <br>${this.filters.date_format(new Date().addDays(3).format())}
            <br> to ${this.filters.date_format(new Date().addDays(16).format())} only!`;
            }
        },

        ready(e) {
            this.disableDays = [];
            this.calendar_start_date = moment(e.startDate)
            this.calendar_end_date = moment(e.endDate)
            this.disableDays = this.getDaysBetweenDates(moment(e.startDate), moment(e.endDate))
            this.allowedDays = this.getDaysBetweenDates(moment().add(3, 'days'), moment().add(365, 'days'))

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

        reloadData() {
            if (this.registration.topic_id && this.registration.location_id && this.registration.class_type && this.registration.class_per_week) {
                if (!this.registration.selected_date_raw) {
                    this.nextAvailableDate();
                } else {
                    this.registration.selectedTaskClasses = [];
                    this.getAvailableTimeSlots();
                }
            }
        },

        nextAvailableDate() {
            let date = new Date().addDays(3)
            this.registration.selected_date = this.filters.toDateString ? this.filters.toDateString(date) : this.filters.date_format(date);
            this.registration.selected_date_raw = date
            this.available_time_slots = this.available_time_slots || '';
            this.getAvailableTimeSlots()
        }, deleteSlot(slot) {
            // Check if we're using the array filter method (mobile) or splice method (desktop)
            if (this.registration.selectedTaskClasses.filter) {
                this.registration.selectedTaskClasses = this.registration.selectedTaskClasses.filter(s =>
                    !(s.slot === slot.slot && s.teacher.id === slot.teacher.id)
                );
            } else {
                this.registration.selectedTaskClasses.splice(this.registration.selectedTaskClasses.indexOf(slot), 1);
            }
        },

        submitStepOne() {
            if (!this.allSlotsSelected) {
                this.notify.setMessage('Please select number of classes as per the class frequency')
            } else {
                this.next();
            }
        }, handleTopicSelection(topic_id) {
            // Handle both direct parameter and component property access
            const topicId = topic_id || this.registration.topic_id;

            if (topicId) {
                this.topics.topics.forEach(topic => {
                    if (topicId === topic.id) { this.registration.topic = topic }
                });
                this.reloadData();
            } else {
                // Mobile version - find by registration.topic_id
                const topic = this.topics.topics.find(t => t.id === this.registration.topic_id);
                this.registration.topic = topic || null;
                this.reloadData();
            }
        },

        handleLocationSelection(location_id) {
            // Handle both direct parameter and component property access
            const locationId = location_id || this.registration.location_id;

            if (locationId) {
                this.locations.locations.forEach(location => {
                    if (locationId === location.id) { this.registration.location = location }
                });
                this.reloadData();
            } else {
                // Mobile version - find by registration.location_id
                const location = this.locations.locations.find(l => l.id === this.registration.location_id);
                this.registration.location = location || null;
                this.reloadData();
            }
        },

        selectClassHandler(slot) {
            if (this.registration.selectedTaskClasses.length >= parseInt(this.registration.class_per_week)) {
                this.notify.setMessage('You have selected the maximum number of classes!')
            } else if (this.isDuplicate && this.isDuplicate(slot)) {
                this.notify.setMessage('You have already selected this slot please select a different one!')
            } else if (this.isSlotSelected && this.isSlotSelected(slot)) {
                this.notify.setMessage('You have already selected this slot!')
            } else {
                this.registration.selectedTaskClasses.push(slot)
            }
        },

        next() {
            if (typeof window !== 'undefined') {
                window.location = "#pricing_div";
            }
            window.scrollTo({ top: 0, behavior: 'smooth' });
            this.step++;
        },

        back() {
            if (typeof window !== 'undefined') {
                window.location = "#pricing_div";
            }
            window.scrollTo({ top: 0, behavior: 'smooth' });
            this.step > 0 ? this.step-- : "";
        },

        studentObject() {
            this.registration.student = {
                id: '',
                full_name: '',
                age: '',
                grade: '',
                email: ''
            }
        },

        parentObject() {
            this.registration.parent = {
                id: '',
                full_name: '',
                age: '',
                email: '',
                stripe_id: '',
                dial_code: '',
                phone_number: '',
                country_id: '',
                phone: null
            }
        },

        phoneInput(number, obj) {
            if (obj) {
                this.registration.phone = obj;
                this.phoneObject = obj;
                this.registration.parent.phone = obj;
                this.registration.parent.dial_code = obj.countryCallingCode
                this.registration.parent.phone_number = obj.nationalNumber
            }
        },

        onPhoneNumberEnter() {
            this.fetchExistingStudents();
        },

        addNewStudentHandler() {
            if (this.existingStudents.length) {
                this.registration.addNewStudent = !this.registration.addNewStudent;
                this.studentStore.existingStudent = !this.studentStore.existingStudent;
                this.registration.student = { id: '', full_name: '', age: '', grade: '', email: '' };
            } else {
                this.registration.addNewStudent = true;
            }
            this.existingStudents = [];
            this.studentObject();
        },

        async fetchExistingStudents() {
            this.existingStudents = [];
            this.studentObject()
            this.registration.addNewStudent = false;
            if (this.registration.phone && this.registration.phone.nationalNumber) {
                try {
                    const response = await this.studentStore.getExistingStudentsNew(this.registration);
                    this.studentStore.students = response.data.students;
                    this.studentStore.parent = response.data.parent;
                    this.existingStudents = response.data.students;
                    this.studentStore.addStudent = (response.data.parent !== null) ? false : true;
                    this.studentStore.existingStudent = (response.data.parent !== null) ? false : true;
                    this.studentStore.students_count = response.data.students_count;

                    // Make sure we don't overwrite the phone number
                    const currentPhone = this.registration.parent?.phone;
                    const currentPhoneNumber = this.registration.parent?.phone_number;
                    const currentDialCode = this.registration.parent?.dial_code;

                    this.registration.parent = this.studentStore.parent || {
                        id: '',
                        full_name: '',
                        age: '',
                        email: '',
                        stripe_id: '',
                        dial_code: '',
                        phone_number: '',
                        country_id: '',
                        phone: null
                    };

                    // Restore phone info
                    this.registration.parent.phone = currentPhone;
                    this.registration.parent.phone_number = currentPhoneNumber;
                    this.registration.parent.dial_code = currentDialCode;
                    this.registration.amount = this.net_price;

                    if (this.existingStudents.length == 0) {
                        this.addNewStudentHandler();
                    }
                } catch (error) {
                    this.addNewStudentHandler();
                }
            }
        },

        async redirectToCheckout() {
            try {
                let fetchSession = '';
                this.registration.totalAmount = this.net_price;
                this.next();

                // Wait for DOM to be ready after step change
                await this.$nextTick();

                const fetchClientSecret = async () => {
                    const response = await axios.post('/forms/checkout', {
                        registration: this.registration,
                        coupon: this.coupon,
                        type: 'subscription',
                        mode: 'subscription',
                    });

                    if (response.data.error) {
                        this.stripe_error = response.data.error;
                        this.slackNotificationForStripeError(response.data.error);
                        throw new Error(response.data.error);
                    }

                    const clientSecret = response.data.fetchClientSecret;
                    fetchSession = response.data.fetchSession;
                    this.registration.parent = response.data.parent;
                    this.registration.student = response.data.student;
                    this.registration.parent.phone = this.registration.phone;
                    this.coupon.isValid = response.data.isValid;
                    this.coupon.id = response.data.couponId;
                    return clientSecret;
                };

                const handleComplete = async () => {
                    if (this.checkout) {
                        this.checkout.destroy();
                    }
                    await this.checkStatus(fetchSession);
                }

                // Clean up any existing checkout instance
                if (this.checkout) {
                    this.checkout.destroy();
                    this.checkout = null;
                }

                // Clear any previous error
                this.stripe_error = "";

                // Add small delay to ensure DOM element is available
                await new Promise(resolve => setTimeout(resolve, 100));

                // Verify the checkout element exists before mounting
                const checkoutElement = document.getElementById('checkout');
                if (!checkoutElement) {
                    console.error('Checkout element not found in DOM');
                    throw new Error('Checkout element not found in DOM');
                }

                console.log('Initializing Stripe checkout...');
                this.checkout = await stripe.initEmbeddedCheckout({
                    fetchClientSecret,
                    onComplete: handleComplete
                });

                console.log('Mounting Stripe checkout to element...');
                this.checkout.mount('#checkout');
                console.log('Stripe checkout mounted successfully');
            } catch (error) {
                console.error('Error in redirectToCheckout:', error);
                this.stripe_error = error.message || error;
            }
        },

        async checkStatus(sessionId) {
            const response = await axios.post('/forms/check_payment_status', {
                session_id: sessionId,
            });

            if (response.data.error) {
                this.stripe_error = response.data.error;
                return;
            }
            if (response.data.payment_status == 'open') {
            } else if (response.data.payment_status == 'complete') {
                this.registration.isPaymentSuccess = true;
                this.registration.totalAmount = response.data.amount_total;
                this.totalAmount = response.data.amount_total;
                this.registration.amount_subtotal = response.data.amount_subtotal;
                this.coupon.amount_off = response.data.amount_discount;
                this.registration.payment_payload = response.data.payload;
                this.registration.payment_id = response.data.payload.payment_intent;
                this.registration.coupon = this.coupon;
                this.coupon.amount = this.total_amount;
                this.coupon.isValid = response.data.isValid;
                this.registration.total_amount = this.net_price;
                axios({
                    method: "POST",
                    url: '/forms/monthlySubscriptionData',
                    data: this.registration,
                }).then((response) => {
                    if (response.data.message === 'Subscription booked successfully') {
                        this.next();
                    }
                })
            }
        },

        slackNotificationForStripeError(error) {
            let _this = this;
            axios({
                method: "post",
                url: "/web/slackNotificationForStripeError",
                data: {
                    message: error,
                    form: 'Subscription Form',
                    user: _this.registration,
                },
            })
        },

        switchPlan(planValue, event = null) {
            this.selectedPlan = planValue;

            const billingCycleMap = {
                monthly: 1,
                quarterly: 3,
                semi: 6,
            };

            const newCycle = billingCycleMap[planValue];

            // Only update if different to avoid unnecessary reactivity
            if (this.registration.billing_cycle !== newCycle) {
                this.registration.billing_cycle = newCycle;
                this.handleBillingCycleChange && this.handleBillingCycleChange();
            }

            if (event && event.currentTarget) {
                this.updateSlider(event.currentTarget);
            } else {
                this.$nextTick(() => this.updateSlider && this.updateSlider());
            }
        }
    }
}
