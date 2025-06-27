import axios from 'axios'

let stripe = Stripe(
    "pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69"
);

export default {
    methods: {
        calculateDiscount(registration, coupon) {
            const basePrice = registration.session?.price || 0;
            const optionalPrice = registration.optional_date
                ? registration.session?.optional_price || 0
                : 0;
            const unitAmount = basePrice + optionalPrice;
            let finalAmount = unitAmount;
            const discountPercentage =
                ((unitAmount / 0.8 - unitAmount) / (unitAmount / 0.8)) * 100 ||
                null;
            const originalPrice = unitAmount / 0.8 || null;

            let isCoupon = false;
            let couponPercentage = 0;
            let couponAmount = coupon?.amount_off || 0;

            if (couponAmount > 0) {
                finalAmount -= couponAmount;
                couponPercentage = (couponAmount / unitAmount) * 100 || null;
                isCoupon = true;
            }

            return {
                amount: finalAmount,
                original_amount: Math.round(originalPrice * 100) / 100 || null,
                percentage_off: discountPercentage || null,
                coupon_percentage_off: couponPercentage || null,
                is_coupon: isCoupon || null,
                coupon_amount: couponAmount,
            };
        },

        getCoupon(registration) {
            return this.coupon || {};
        },

        changeStep() {
            this.step++;
        },

        next(callback = null) {
            // Smooth scroll for desktop version
            if (document.getElementById("campsForm")) {
                const campsForm = document.getElementById("campsForm");
                campsForm.scrollIntoView({
                    block: "start",
                });
            }

            if (callback) {
                callback();
            }
            this.step++;

            this.$nextTick(() => {
                if (this.step === 2) {
                    // Initialize accordion state for step 2 if needed
                }
                if (this.step === 5) {
                    // Handle step 5 initialization if needed
                }
            });
        },

        back() {
            // Smooth scroll for desktop version
            if (document.getElementById("campsForm")) {
                const campsForm = document.getElementById("campsForm");
                campsForm.scrollIntoView({
                    block: "start",
                });
            }
            this.step--;
        },

        changeLocation(location) {
            this.locationsStore.location = location;
            this.currentRegistration.location = location;
            this.selected_location_id = location.id;
            this.campStore.fetchFormsGroupsTopics({ location_id: location.id });
        },

        topicSelected(group, topic) {
            this.currentRegistration.group = group;
            this.currentRegistration.topic = topic;
            this.currentRegistration.location = this.locationsStore.location;
            this.tempGroups = this.campStore.groups;
            this.campStore.fetchFormsGroupsSessions({ id: group.id });
            this.campStore.groups = this.tempGroups;
        },

        calculateRegistrationAmount(registration) {
            const basePrice = registration.session?.price || 0;
            const optionalPrice = registration.optional_date
                ? registration.session?.optional_price || 0
                : 0;
            const numberOfStudents = registration.students
                ? registration.students.length
                : 1;
            return (basePrice + optionalPrice) * numberOfStudents;
        },

        getStudentsData() {
            if (this.currentRegistration.phone?.nationalNumber) {
                this.studentStore
                    .getExistingStudentsNew(this.currentRegistration)
                    .then((response) => {
                        this.studentStore.students = response.data.students;
                        this.studentStore.parent = response.data.parent;
                        this.studentStore.addStudent =
                            response.data.parent !== null ? false : true;
                        this.studentStore.existingStudent =
                            response.data.parent !== null ? false : true;
                        this.studentStore.students_count =
                            response.data.students_count;

                        // Make sure we don't overwrite the phone number
                        const currentPhone = this.currentRegistration.parent?.phone;
                        const currentPhoneNumber = this.currentRegistration.parent?.phone_number;
                        const currentDialCode = this.currentRegistration.parent?.dial_code;

                        this.currentRegistration.parent = this.studentStore.parent || {
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
                        this.currentRegistration.parent.phone = currentPhone;
                        this.currentRegistration.parent.phone_number = currentPhoneNumber;
                        this.currentRegistration.parent.dial_code = currentDialCode;
                    });
            }
        },

        phoneInput(number, obj) {
            if (obj) {
                this.currentRegistration.phone = obj;
            }
        },

        handlePhoneBlur() {
            if (this.currentRegistration.phone?.nationalNumber) {
                this.getStudentsData();
            }
        },

        addANewStudent() {
            this.studentStore.addStudent = !this.studentStore.addStudent;
            this.studentStore.existingStudent = !this.studentStore.existingStudent;
            this.resetExistingStudents();

            if (this.studentStore.addStudent) {
                this.currentRegistration.student = {
                    id: '',
                    full_name: '',
                    age: '',
                    email: ''
                };
            }
        },

        async addStudentToParentInMultiCamps() {
            // Ensure the student data is valid
            if (
                !this.currentRegistration.student.full_name ||
                !this.currentRegistration.student.age
            ) {
                alert("Please fill in all required fields for the student.");
                return;
            }

            const phoneValue = this.registrations[0]?.phone || null;

            if (this.currentRegistration.phone == null) {
                this.currentRegistration.phone = phoneValue;
            }

            try {
                const response = await axios.post("/forms/addStudentToParentInMultiCamps", {
                    student: this.currentRegistration.student,
                    parent: this.currentRegistration.parent,
                    phone: phoneValue,
                    topic: this.currentRegistration.topic,
                });

                if (response.data.message === "Student Added Successfully.") {
                    // Reset student form
                    this.currentRegistration.student = {
                        id: '',
                        full_name: '',
                        age: '',
                        email: ''
                    };
                    this.studentStore.addStudent = false;
                    this.getStudentsData();
                }
            } catch (error) {
                console.error("Error adding student:", error);
                alert("An error occurred while adding the student.");
            }
        },

        addStudentToList() {
            if (!this.currentRegistration.students) {
                this.currentRegistration.students = [];
            }

            if (
                this.currentRegistration.student.full_name &&
                this.currentRegistration.student.age
            ) {
                this.currentRegistration.students.push({
                    ...this.currentRegistration.student,
                });

                // Reset the student input field
                this.currentRegistration.student = {
                    id: '',
                    full_name: '',
                    age: '',
                    email: ''
                };
                this.studentStore.addStudent = false;
            }
        },

        resetExistingStudents() {
            this.currentRegistration.student = {
                id: '',
                full_name: '',
                age: '',
                email: ''
            };
        },

        addMore() {
            this.addNewRegistration();
            this.step = 0;
            this.bookForm = false;
            this.isModalEnroll = false;
            this.studentStore.existingStudent = false;

            if (this.step == 0) {
                this.$nextTick(() => {
                    // Handle mobile-specific logic if needed
                });
            }
        },

        addNewRegistration() {
            // Create a deep copy of the current registration
            const newRegistration = JSON.parse(
                JSON.stringify({
                    phone: null,
                    group: null,
                    topic: null,
                    session: '',
                    type: 'camps',
                    class_type: 'Camps',
                    selected_date: new Date(),
                    location: this.locationsStore.location,
                    optional_date: false,
                    students: [],
                    student: {
                        id: '',
                        full_name: '',
                        age: '',
                        email: ''
                    },
                    parent: this.registrations.length > 0
                        ? { ...this.registrations[0].parent }
                        : {
                            id: '',
                            full_name: '',
                            age: '',
                            email: '',
                            stripe_id: '',
                        },
                    timezone: 'America/Los_Angeles',
                })
            );

            // Push the new independent registration
            this.registrations.push(newRegistration);

            // Set currentRegistration to the newly added registration
            this.currentRegistration = newRegistration;
        },

        removeRegistration(index) {
            this.registrations.splice(index, 1);
            if (this.registrations.length === 0) {
                this.addNewRegistration();
            } else {
                // Set currentRegistration to the last registration in the array
                this.currentRegistration = this.registrations[this.registrations.length - 1];
            }
        },

        proceedToCheckout() {
            this.isModalOpen = false;
            this.redirectToCheckout();
        },

        toggleStudent(student) {
            if (!this.currentRegistration.students) {
                this.currentRegistration.students = [];
            }
            const index = this.currentRegistration.students.findIndex(
                (s) => s.id === student.id
            );
            if (index > -1) {
                this.currentRegistration.students.splice(index, 1);
            } else {
                this.currentRegistration.students.push(student);
            }
        },

        calculateAmount() {
            this.totalAmount = 0;
            this.amount = 0;

            if (this.currentRegistration && this.currentRegistration.session) {
                const basePrice = this.currentRegistration.session.price || 0;
                const optionalPrice = this.currentRegistration.optional_date
                    ? this.currentRegistration.session.optional_price || 0
                    : 0;
                const numberOfStudents = this.currentRegistration.students
                    ? this.currentRegistration.students.length
                    : 1;
                this.amount = (basePrice + optionalPrice) * numberOfStudents;
                this.totalAmount = this.amount;
            }
        },

        async redirectToCheckout() {
            try {
                let fetchSession = '';
                this.next();

                // Wait for DOM to be ready after step change
                await this.$nextTick();

                const fetchClientSecret = async () => {
                    const totalAmount = this.registrations.reduce(
                        (sum, reg) => sum + this.calculateRegistrationAmount(reg),
                        0
                    );

                    const phoneValue = this.registrations[0]?.phone || null;

                    this.registrations = this.registrations.map(
                        (registration) => ({
                            ...registration,
                            phone: phoneValue,
                        })
                    );

                    const response = await axios.post('/forms/newCampsCheckout', {
                        registrations: this.registrations,
                        coupon: this.coupons,
                        type: 'camps',
                        mode: 'camps',
                        totalAmount: totalAmount,
                        allStudents: this.allStudents,
                    });

                    if (response.data.error) {
                        this.stripe_error = response.data.error;
                        this.slackNotificationForStripeError && this.slackNotificationForStripeError(response.data.error);
                        throw new Error(response.data.error);
                    }

                    const clientSecret = response.data.fetchClientSecret;
                    fetchSession = response.data.fetchSession;

                    this.registrations = this.registrations.map(
                        (reg, index) => ({
                            ...reg,
                            students:
                                response.data.registrations &&
                                    response.data.registrations[index]
                                    ? response.data.registrations[index].students || []
                                    : [],
                        })
                    );

                    this.coupons.isValid = response.data.isValid;
                    this.coupons.id = response.data.couponId;
                    return clientSecret;
                };

                const handleComplete = async () => {
                    if (this.checkout) {
                        this.checkout.destroy();
                    }
                    await this.checkStatus(fetchSession);
                };

                // Clean up any existing checkout instance
                if (this.checkout) {
                    this.checkout.destroy();
                    this.checkout = null;
                }

                // Clear any previous error
                this.stripe_error = '';

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
            try {
                const response = await axios.post('/forms/check_payment_status', {
                    session_id: sessionId,
                });

                if (response.data.error) {
                    this.stripe_error = response.data.error;
                    return;
                }

                if (response.data.payment_status === 'open') {
                    // Handle open payment status
                } else if (response.data.payment_status === 'complete') {
                    const phoneValue = this.registrations[0]?.phone || null;

                    this.serverTotalAmount = response.data.amount_total;

                    this.registrations = this.registrations.map(
                        (registration) => ({
                            ...registration,
                            phone: phoneValue,
                            totalAmount: response.data.amount_total || 0,
                            amount_subtotal: response.data.amount_subtotal || 0,
                            payment_payload: response.data.payload || {},
                            payment_id: response.data.payload?.payment_intent || '',
                        })
                    );

                    this.coupons.amount_off = response.data.amount_discount || 0;
                    this.coupons.isValid = response.data.isValid || false;

                    const saveResponse = await axios.post('/forms/addMultiCampRegistration', {
                        registrations: this.registrations,
                        coupon: this.coupons,
                        type: 'camps',
                        allStudents: this.allStudents,
                    });

                    if (saveResponse.data.message === 'Camp Registrations Successful.') {
                        this.next();
                    }
                }
            } catch (error) {
                console.error('Error checking payment status:', error);
                this.stripe_error = 'Something went wrong while checking payment status.';
            }
        },

        enrollTopicSelected(selectedTopic, selectedGroup) {
            this.next(this.topicSelected(selectedGroup, selectedTopic));
        },

        getSliderStyle() {
            if (!this.locationsStore.location) {
                return {};
            }

            const activeIndex = this.locationsStore.locations.findIndex(
                (location) => location.id === this.locationsStore.location.id
            );

            if (activeIndex === -1) {
                return {};
            }

            const totalButtons = this.locationsStore.locations.length;
            const buttonWidth = `calc(${100 / totalButtons}% - 8px)`;
            const leftPosition = `calc(${(100 / totalButtons) * activeIndex
                }% + 4px)`;

            return {
                width: buttonWidth,
                left: leftPosition,
            };
        },

        toggleAccordion(index) {
            // Vue 3 compatible way to update reactive array
            this.accordionOpen[index] = !this.accordionOpen[index];
        },

        slackNotificationForStripeError(error) {
            axios({
                method: "post",
                url: "/web/slackNotificationForStripeError",
                data: {
                    message: error,
                    form: 'Camps Form',
                    user: this.currentRegistration,
                },
            });
        }
    }
}
