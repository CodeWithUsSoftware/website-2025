// import './bootstrap';

import _ from "lodash"
import axios from "axios"
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"
axios.defaults.baseURL = "https://portal.codewithus.com/api"
// axios.defaults.baseURL = "http://localhost:3000/api"

window.axios = axios // optional: assign it to window for global use
window._ = _;

import { createApp } from "vue";
import { createPinia } from "pinia";

import Notification from "./components/Notification.vue";
import Loader from "./components/Loader.vue";
import VueTelInput from "vue3-tel-input";
import TrialForm from "./components/TrialForm.vue";
import TrialFormMobile from "./components/TrialFormMobile.vue";
import MonthlySubscriptionForm from "./components/MonthlySubscriptionForm.vue";
import TrialFormForSchools from "./components/TrialFormForSchools.vue";
import SchoolProgramForm from "./components/SchoolProgramForm.vue";
import CampsForm from "./components/CampsForm.vue";
import CustomCampsForm from "./components/CustomCampsForm.vue";
import CampsSlider from "./components/CampsSlider.vue";
import Reschedule from "./components/Reschedule.vue";
import ScheduleAPhoneClass from "./components/ScheduleAPhoneClass.vue";
import ScheduleAPhoneClassMobile from "./components/ScheduleAPhoneClassMobile.vue";
import PartnerEnquiryForm from "./components/PartnerEnquiryForm.vue";
import JobsForm from "./components/JobsForm.vue";
import ContactUs from "./components/ContactUs.vue";


import "vue3-tel-input/dist/vue3-tel-input.css";
import { VueReCaptcha } from "vue-recaptcha-v3";

import { useLoaderStore } from "./store/loaderStore";
import { useAuthStore } from "./store/authStore";
import { useErrorStore } from "./store/errorsStore";
import { useNotificationStore } from "./store/notificationStore";


// This is a test remove this line anytime

const app = createApp({
    data() {
        return {
            holidays_for_scheduling: [],
        };
    },
    created() {
        this.backendInitData();
    },
    methods: {
        backendInitData() {
            axios({
                method: "GET",
                url: "/web/getHolidaysForScheduling",
            })
                .then((response) => {
                    this.holidays_for_scheduling = JSON.stringify(
                        response.data.holidays
                    );
                    localStorage.setItem(
                        "holidays",
                        JSON.stringify(response.data.holidays)
                    );
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
});


app.component("Notification", Notification);
app.component("loader", Loader);
app.component("trial-form", TrialForm);
app.component("trial-form-mobile", TrialFormMobile);
app.component("monthly-subscription-form", MonthlySubscriptionForm);
app.component("trial-form-for-schools", TrialFormForSchools);
app.component("school-program-form", SchoolProgramForm);
app.component("camps-form", CampsForm);
app.component("custom-camps-form", CustomCampsForm);
app.component("camps-slider", CampsSlider);
app.component("reschedule", Reschedule);
app.component("schedule-a-phone-class", ScheduleAPhoneClass);
app.component("schedule-a-phone-class-mobile", ScheduleAPhoneClassMobile);
app.component("partner-enquiry-form", PartnerEnquiryForm);
app.component("jobs-form", JobsForm);
app.component("contact-us", ContactUs);


app.use(createPinia()).use(VueTelInput).use(VueReCaptcha, { siteKey: "6LfZIbcqAAAAAC_epK4zt8UHf4VCr7NOy8O_H2nE" }).mount("#app");

const loader = useLoaderStore();
const authStore = useAuthStore();
const errors = useErrorStore();
const notify = useNotificationStore();

// Add a request interceptor
axios.interceptors.request.use(function (config) {
    !loader.loader ? loader.setLoader(true) : "";
    return config;
});

axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["Access-Control-Allow-Origin"] = "*";
axios.defaults.headers.common["Authorization"] = "Bearer " + authStore.token;
axios.defaults.headers.common["timezone"] = Intl.DateTimeFormat().resolvedOptions().timeZone;
axios.defaults.headers.common["is_second_brand"] = "false";

// Add a response interceptor
axios.interceptors.response.use(
    function (response) {
        loader.loader ? loader.setLoader(false) : "";
        errors.set({});
        if (response.data.message) {
            notify.setMessage(response.data.message);
        }
        return response;
    },
    function (error) {
        loader.loader ? loader.setLoader(false) : "";

        // Do something with request error
        if (
            error.response &&
            error.response.data &&
            error.response.data.errors
        ) {
            errors.set(error.response.data.errors);
        }
        if (error.response.data.message) {
            notify.setMessage(error.response.data.message);
        }
        return Promise.reject(error);
    }
);
