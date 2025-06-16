<template>
  <div class="min-h-screen bg-gray-50">
    <div id="trial-form-mobile" class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden">

      <!-- Mobile Header -->
      <div class="bg-white px-4 py-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
          <button v-if="step > 1" @click="back" class="p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <div v-else class="w-10"></div>

          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
            </div>
            <h1 class="text-lg font-medium text-gray-900">Schedule a Trial Class</h1>
          </div>

          <div class="w-10"></div>
        </div>

        <!-- Progress Steps -->
        <div class="flex items-center justify-center mt-6 space-x-2">
          <div v-for="n in 7" :key="n" class="flex items-center">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium"
                 :class="step >= n ? 'bg-blue-500 text-white' : step === n ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-500'">
              {{ n }}
            </div>
            <div v-if="n < 7" class="w-8 h-0.5 mx-2"
                 :class="step > n ? 'bg-blue-500' : 'bg-gray-200'"></div>
          </div>
        </div>

        <!-- Step Labels -->
        <div class="flex justify-center mt-2">
          <span class="text-sm text-gray-600">
            <template v-if="step === 1">Class Details</template>
            <template v-else-if="step === 2">Date & Time</template>
            <template v-else-if="step === 3">Parent Info</template>
            <template v-else-if="step === 4">Student Info</template>
            <template v-else-if="step === 5">Confirm</template>
            <template v-else-if="step === 6">Payment</template>
            <template v-else-if="step === 7">Complete</template>
          </span>
        </div>
      </div>

      <!-- Step Content -->
      <div class="flex-1 overflow-hidden">
        <transition :name="slide_animation" mode="out-in">
          <div :key="step" class="p-6 h-full flex flex-col">
            <!-- Step 1: Class Details -->
            <section v-if="step === 1">
              <div class="text-center mb-8">
                <p class="text-gray-600">Choose your trial class details</p>
              </div>

              <div class="space-y-6 flex-1">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Location <span class="text-red-500">*</span>
                  </label>
                  <select
                    v-model="registration.location_id"
                    @change="handleLocationSelection(registration.location_id)"
                    required
                    class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  >
                    <option value="" disabled>Select Location</option>
                    <option v-for="location in locations.locations" :key="location.id" :value="location.id">{{location.location_name}}</option>
                  </select>
                  <small v-if="error.errors.location_id" class="text-red-500 mt-1 block">{{error.errors.location_id}}</small>
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Topic <span class="text-red-500">*</span>
                  </label>
                  <select
                    v-model="registration.topic_id"
                    @change="handleTopicSelection(registration.topic_id)"
                    required
                    class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  >
                    <option value="" disabled>Select Topic</option>
                    <option v-for="topic in topics.topics" :key="topic.id" :value="topic.id">{{topic.name}}</option>
                  </select>
                  <small v-if="error.errors.topic_id" class="text-red-500 mt-1 block">{{error.errors.topic_id}}</small>
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Class Type <span class="text-red-500">*</span>
                  </label>
                  <select
                    v-model="registration.class_type"
                    @change="reloadData"
                    required
                    class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  >
                    <option value="" disabled>Select Class Type</option>
                    <option value="group">{{group_session}} ({{free_trial}})</option>
                    <option value="private">{{private_session}} (${{private_session_fee}} {{trial}})</option>
                  </select>
                  <small v-if="error.errors.class_type" class="text-red-500 mt-1 block">{{error.errors.class_type}}</small>
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="next"
                  :disabled="!registration.location_id || !registration.topic_id || !registration.class_type"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Next
                </button>
              </div>
            </section>

            <!-- Step 2: Date & Time Selection -->
            <section v-if="step === 2">
              <div class="text-center mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Select Date & Time</h3>
                <p class="text-red-500 text-sm" v-if="registration.class_type">
                  Please Select any date starting from Wednesday Jun 11th, 2025 to Tuesday Jun 24th, 2025 only!
                </p>
              </div>

              <div class="flex-1 space-y-6">
                <!-- Calendar -->
                <div class="bg-white rounded-lg">
                  <vue-cal
                    style="height:300px"
                    @view-change="ready"
                    @ready="ready"
                    :time="false"
                    active-view='month'
                    :disable-views="['years', 'year', 'week', 'day']"
                    hide-view-selector
                    xsmall
                    :selected-date="registration.selected_date_raw"
                    @cell-focus="dateClicked"
                    :disable-days="actualDays"
                  />
                </div>

                <!-- Time Slots -->
                <div v-if="registration.selected_date" class="space-y-4">
                  <div class="text-center">
                    <h4 class="text-blue-500 font-medium">
                      {{ filters.day_date(registration.selected_date_raw) }} ({{ filters.format_time_zone(timezone) }})
                    </h4>
                  </div>

                  <div class="space-y-2 max-h-48 overflow-y-auto">
                    <template v-for="(slot, index) in available_time_slots" :key="index">
                      <div v-if="registration.selected_date && slot">
                        <button
                          @click="selectClassHandler(slot)"
                          type="button"
                          class="w-full p-4 rounded-lg font-medium transition-colors"
                          :class="registration.slot.slot === slot.slot && registration.slot.teacher.id === slot.teacher.id
                            ? 'bg-blue-500 text-white border-2 border-blue-500'
                            : 'bg-blue-50 text-blue-600 border-2 border-transparent hover:border-blue-200'"
                        >
                          {{ slot.slot_display }}
                          <div class="text-sm">{{ slot.teacher.full_name }}</div>
                        </button>
                      </div>
                    </template>

                    <p v-if="!available_time_slots || Object.keys(available_time_slots).length === 0" class="text-center text-red-500 py-4">{{ notification }}</p>
                  </div>
                </div>

                <div v-else class="flex items-center justify-center py-8">
                  <p class="text-gray-500 text-center" v-html="notification"></p>
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="next"
                  :disabled="!registration.slot.slot"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Next
                </button>
              </div>
            </section>

            <!-- Step 3: Parent Info -->
            <section v-if="step === 3">
              <div class="flex-1 space-y-6">
                <div class="text-center mb-6">
                  <h3 class="text-lg font-medium text-gray-900 mb-2">Parent Contact Information</h3>
                </div>

                <!-- Phone Number -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Phone Number <span class="text-red-500">*</span>
                  </label>
                  <vue-tel-input
                    v-bind="bindProps"
                    :preferredCountries="preferredCountries"
                    :autoFormat="false"
                    @input="phoneInput"
                    @blur="onPhoneNumberEnter"
                    @country-changed="onPhoneNumberEnter"
                    v-model="phone"
                    :autoDefaultCountry="true"
                    :defaultCountry="countries.countries.character_code"
                    required
                    class="w-full"
                  />
                  <small v-if="errors && errors.phone_number" class="text-red-500 mt-1 block">{{errors.phone_number[0]}}</small>
                </div>

                <!-- Email -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                  </label>
                  <input
                    type="email"
                    :placeholder="free_session_email"
                    v-model="registration.parent.email"
                    required
                    class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  >
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="next"
                  :disabled="!registration.parent.email || !registration.parent.phone_number"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Next
                </button>
              </div>
            </section>

            <!-- Step 4: Student Info -->
            <section v-if="step === 4">
              <div class="flex-1 space-y-6">
                <div class="text-center mb-6">
                  <h3 class="text-lg font-medium text-gray-900 mb-2">Student Information</h3>
                </div>

                <!-- Student Selection -->
                <div v-if="existingStudents.length">
                  <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Choose a Student <span class="text-red-500">*</span>
                    </label>
                    <p class="text-sm text-gray-500">Select an existing student below or add new</p>
                  </div>

                  <div class="space-y-3">
                    <label v-for="s in existingStudents" :key="s.id" class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                      <input
                        type="radio"
                        name="student"
                        :value="s"
                        v-model="registration.student"
                        class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-500"
                        required
                      >
                      <span class="ml-3 text-gray-700 capitalize">{{s.full_name}}</span>
                    </label>
                  </div>

                  <button
                    type="button"
                    @click="addNewStudentHandler"
                    class="mt-4 w-full flex items-center justify-center py-3 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-50 transition-colors"
                  >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add a New Student
                  </button>
                </div>

                <!-- New Student Form -->
                <div v-if="registration.addNewStudent || !existingStudents.length" class="space-y-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Student Name <span class="text-red-500">*</span>
                    </label>
                    <input
                      type="text"
                      v-model="registration.student.full_name"
                      required
                      class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Age <span class="text-red-500">*</span>
                    </label>
                    <input
                      type="number"
                      v-model="registration.student.age"
                      required
                      class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                  </div>
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    How did you hear about us? <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="registration.ad_source"
                    type="text"
                    required
                    placeholder="e.g. Google, Friend, Social Media"
                    class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  >
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="next"
                  :disabled="!registration.student.full_name"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Next
                </button>
              </div>
            </section>

            <!-- Step 5: Confirmation -->
            <section v-if="step === 5">
              <div class="text-center mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Are you sure you want to book this trial class?</h3>
              </div>

              <div class="flex-1 space-y-6">
                <div class="bg-gray-50 rounded-lg p-4 space-y-2">
                  <div class="flex justify-between">
                    <span class="text-gray-600">Class:</span>
                    <span class="font-medium">{{filters.day_date(registration.selected_date_raw)}}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Time:</span>
                    <span class="font-medium">{{ registration.slot.slot_display }}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Timezone:</span>
                    <span class="font-medium">{{filters.format_time_zone(timezone)}}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Teacher:</span>
                    <span class="font-medium">{{registration.slot.teacher.full_name}}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Location:</span>
                    <span class="font-medium">{{registration.location.location_name}}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Student:</span>
                    <span class="font-medium">{{registration.student.full_name}}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium">{{registration.parent.email}}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-medium">{{phoneObject.countryCallingCode}} {{registration.parent.phone_number}}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Amount:</span>
                    <span class="font-medium">${{ registration.class_type !== 'group' ? private_session_fee : 0}}</span>
                  </div>
                </div>

                <div class="flex items-center justify-center space-x-2">
                  <input type="checkbox" v-model="termsAndConditions" class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-500">
                  <label class="text-sm text-gray-600">
                    I agree to the <a :href="drive_link" class="text-blue-500 underline" target="_blank">terms and conditions</a>
                  </label>
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  :disabled="!termsAndConditions"
                  @click="registration.class_type != 'group' ? redirectToCheckout() : next()"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Book Now
                </button>
              </div>
            </section>

            <!-- Step 6: Payment -->
            <section v-show="step === 6" class="payment-section">
              <div class="flex-1 space-y-6 min-h-96">
                <div class="text-center mb-6">
                  <h3 class="text-lg font-medium text-gray-900 mb-2">Payment</h3>
                  <p class="text-gray-600">Complete your payment to confirm your trial class</p>
                  <p class="text-xs text-gray-400 mt-2">Step: {{ step }} | Class Type: {{ registration.class_type }}</p>
                </div>

                <div v-if="stripe_error" class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                  <p class="text-red-600 text-sm">{{ stripe_error }}</p>
                </div>

                <div id="checkout">
                  <!-- Stripe will mount the payment form here -->
                </div>
              </div>
            </section>

            <!-- Step 7: Success -->
            <section v-if="step === 7">
              <div class="text-center space-y-6">
                <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <h3 class="text-xl font-semibold text-green-600">Booking Confirmed!</h3>
                <p class="text-gray-600">You successfully booked a trial class.</p>

                <div class="bg-gray-50 rounded-lg p-4 mt-6 text-left space-y-2 text-sm">
                  <p><span class="font-medium">Class:</span> {{filters.day_date(registration.selected_date_raw)}}</p>
                  <p><span class="font-medium">Time:</span> {{ registration.slot.slot_display }}</p>
                  <p><span class="font-medium">Timezone:</span> {{filters.format_time_zone(timezone)}}</p>
                  <p><span class="font-medium">Teacher:</span> {{registration.slot.teacher.full_name}}</p>
                  <p><span class="font-medium">Location:</span> {{registration.location.location_name}}</p>
                  <p><span class="font-medium">Student:</span> {{registration.student.full_name}}</p>
                </div>

                <a href="https://www.codewithus.com/school-program#freeform"
                  class="inline-block mt-6 text-blue-500 underline font-medium">
                  How to access your trial class
                </a>
              </div>
            </section>
          </div>
        </transition>
      </div>
    </div>
    <loader></loader>
    <Notification></Notification>
  </div>
</template>


<script>
import { useCountriesStore } from "../store/countries";
import { useLocationsStore } from "../store/locations";
import { useFiltersStore } from "../store/filtersStore";
import { useTopics } from "../store/topics";
import { useErrorStore } from "../store/errorsStore";
import { useStudentsStore } from "../store/studentsStore";
import recaptcha from "../../../mixins/recaptcha";
import partner_code_cookie from "../../../mixins/partner_code_cookie"
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
import moment from "moment";

// let stripe = Stripe("pk_test_516dVSfF9uOieGMSt1f9SDZ684fKcYd7hocVBUMs4yyJbikYit4S3GKus0Jw8QYfYzyNOimuPDoLBPq1KgVkSkzW900USvWxqzE");
let stripe = Stripe("pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69");

export default  {
  components : { VueCal },
    setup(){
        const countries = useCountriesStore()
        const locations = useLocationsStore()
        const filters = useFiltersStore()
        const topics = useTopics()
        const error = useErrorStore()
        const studentStore = useStudentsStore();
        return {
            countries,locations,topics,filters,error,studentStore
        }
    },
  mixins : [partner_code_cookie,recaptcha],
  props: {
        phone_number: {
            default : false
        },
        trial: {
            default : false
        },
        private_session_fee: {
            default : false
        },
        private_session: {
            default : false
        },
        free_trial: {
            default : false
        },
        group_session: {
            default : false
        },
        free_session_email: {
            default : false
        },
        homework : {
            default : false
        },
        drive_link : {
            default : false
        },
    },
  data() {
    return {
        stripe_error : '',
        checkout: null,
    //   homework: false,
      landing_page: false,
      referral_code: false,
      //error : '',
    //   stripe : '',
      termsAndConditions:false,
      showAddStudentLink : false,
      slide_animation: '',
      step: 1, // step 4 is payment step
      existingStudents : [],
      phone : '',
      phoneObject : '',
      registration: {
        homework : this.homework,
        landing_page : this.landing_page,
        referral_code : this.referral_code,
        isPaymentSuccess : false,
        selectTaskClassLater : false,
        slot: '',
        location : '',
        location_id : '',
        topic : '',
        topic_id : '',
        addNewStudent : false,
        selected_date: '',
        selected_date_raw : '',
        partner_signup: null,
        registration_type: 'Free Group Sessions',
        class_type: this.homework ? 'private' : '',
        ad_source: '',
        expectations: '',
        parent: '',
        student: '',
        time_zone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        private_session_plan_id: 'prod_K699XNKkvZd84J',
        //private_session_plan_id: 'prod_HOGf8xc54aXtga',
        group_session_plan_id: '',
        private_session_amount :  30,
        group_session_amount :  0,
        phone: null,
        type:'trial',
      },
      timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
      bindProps: {
        inputOptions: {
          required: true,
          styleClasses: '',
          placeholder: this.phone_number
        }
      },
      preferredCountries: ['US', 'GB', 'CA', 'CN', 'IN'],
      available_time_slots : '',
      idempotent_id : '',
      calendar_start_date : '',
      calendar_end_date : '',
      disableDays : [],
      allowedDays : [],
      actualDays : [],
      notification : '',
      holidays_for_scheduling : JSON.parse(localStorage.getItem("holidays")),
      planId:'price_1ORmEhF9uOieGMSt6mJawIEt',
    }
  },
  computed : {
    group_session_is_free(){
      return this.registration.group_session_amount <= 0 && this.registration.class_type === 'group';
    },
  },
  watch: {
    step(newVal, oldVal) {
      if (newVal > oldVal) {
        this.slide_animation = 'slide-fade'
      } else {
        this.slide_animation = 'slide-fade-reverse'
      }
    },
  },
  created() {
    this.notificationMessage();
    this.resetSelectedSlot();
    this.countries.get();
    this.locations.fetchLocations();
    this.topics.fetchTopics();
    this.studentObject();
    this.parentObject();
  },
  methods: {
      notificationMessage(){
      if(this.loader) {
        this.notification = 'Please wait until the selected date classes have been loaded!'
      } else if (Object.keys(this.error.errors).length) {
        this.notification = 'Please fill in the required fields above'
      } else {
        this.notification = `
             Please Select any date starting from <br>
             ${this.filters.date_format(new Date().addDays(1).format())}
             <br> to ${this.filters.date_format(new Date().addDays(14).format())} only!`;
      }
    },
    ready(e){
        this.disableDays = [];
        this.calendar_start_date = moment(e.startDate)
        this.calendar_end_date = moment(e.endDate)
        this.disableDays = this.getDaysBetweenDates(moment(e.startDate), moment(e.endDate))
        this.allowedDays = this.getDaysBetweenDates(moment().add(3,'days'), moment().add(16, 'days'))

        this.actualDays = _.difference(this.disableDays, this.allowedDays);

        if(this.holidays_for_scheduling.length){
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
    resetSelectedSlot(){
      this.registration.slot = {
        existing:false,
        slot:'',
        slot_display:'',
        space:'',
        space_count:0,
        taskclass: { id : 0 },
        teacher: { id : 0 }
      }
    },
    reloadData(){
      if(this.registration.topic_id && this.registration.location_id && this.registration.class_type){
        if(!this.registration.selected_date_raw){
          this.nextAvailableDate();
        } else {
          this.getAvailableTimeSlots();
        }
      }
    },
    nextAvailableDate(){
      let date = new Date().addDays(3).format();
      this.registration.selected_date = this.filters.date_format(date);
      this.registration.selected_date_raw = date
      this.available_time_slots = '';
      this.getAvailableTimeSlots()
    },
    handleTopicSelection(topic_id){
      //console.log(topic_id);
      this.topics.topics.forEach(topic => {
        if(topic_id === topic.id)
        { this.registration.topic = topic }
      })
      this.reloadData();
    },
    handleLocationSelection(location_id){
      this.locations.locations.forEach(location => {
        if(location_id === location.id)
        { this.registration.location = location }
      })
      this.reloadData()
    },
    selectClassHandler(slot){
      this.registration.slot = slot;
    },
    dateClicked(e){
      let current_selected_date = this.registration.selected_date_raw ? this.registration.selected_date_raw : new Date().format();
      this.registration.selected_date_raw = e;
      let enteredDate = new Date(e).format();
      let today = new Date().addDays(1).format()
      let startDate = new Date().addDays(1).format()
      let endDate = new Date().addDays(14).format()
      let endDatePlusOne = new Date().addDays(15).format()

    //   console.log(current_selected_date,this.registration.selected_date_raw,enteredDate,today,startDate,endDate,endDatePlusOne);
     // console.log(enteredDate,today,endDatePlusOne,moment(enteredDate).isBetween(today, endDatePlusOne));

      if(!moment(enteredDate).isBetween(today, endDatePlusOne)){
        this.$store.commit('notifications/code', 404)
        this.$store.commit(
          'notifications/setMessage',
          `Select date starting from ${this.filters.date_format(startDate)} to ${this.filters.date_format(endDate)} only!`)
        setTimeout(()=>{
          this.registration.selected_date_raw = current_selected_date;
        }, 300)
        return false;
      }

      if(!this.loader) {
        this.registration.selected_date = this.filters.date_format(e);
        this.registration.selected_date_raw = e
        this.available_time_slots = '';
       // console.log(this.registration.selected_date,this.registration.selected_date_raw);
        this.getAvailableTimeSlots()
      } else  {
        this.$store.commit('notifications/code', 404)
        this.$store.commit(
          'notifications/setMessage',
          `Please wait until the selected date classes have been loaded!`)
        setTimeout(()=>{
          this.registration.selected_date_raw = current_selected_date;
        }, 300)
      }


    },
    studentObject(){
      this.registration.student = {
        id: '',
        full_name:'',
        age : '',
        grade: '',
        dob:'',
        postal_address:'',
        homework_type : '',
        homework_types : [],
        additional_email:'',
        additional_phone_number:''
      }
    },
    parentObject(){
      this.registration.parent = {
        id: '',
        full_name:'',
        dial_code : '',
        phone_number : '',
        email: '',
        country_id:'',
        phone : '',
        additional_email:'',
        additional_phone_number:''
      }
    },
    addNewStudentHandler(){
      this.registration.addNewStudent = true;
      this.existingStudents = [];
      this.registration.student = {id: '', full_name:'', age : '', grade: '', dob:'', postal_address:'', additional_email:'', additional_phone_number:'', homework_type : '', homework_types : [] };
    },
    phoneInput(number, obj) {
        if(obj){
            this.phoneObject = obj;
            this.registration.parent.phone = obj;
            this.registration.parent.dial_code = obj.countryCallingCode
            this.registration.parent.phone_number = obj.nationalNumber
            this.registration.parent.phone_number = obj.nationalNumber
            this.registration.phone = obj;
        }
    },
    onPhoneNumberEnter(){
      this.getExistingStudents();
    },
    next() {
    //   if(process.client) { window.location="#freeform" }

        if (typeof window !== 'undefined') {
            window.location = "#freeform";
        }

        if(this.step === 5 && this.registration.class_type === 'group') {
            console.log('group session',this.step);
            // this.addFreeSession()
        } else {
            console.log('b step',this.step);
            this.step++;
            console.log('a step',this.step);
        }
    },
    back() {
    //   if(process.client) { window.location="#freeform" }
      if (typeof window !== 'undefined') {
            window.location = "#freeform";
        }
      this.step > 1 ? this.step-- : ''
    },
    getExistingStudents(){
      let _this = this;
      this.existingStudents = [];
      this.studentObject();
      if(_this.registration.parent.phone_number !=null) {
        _this.registration.parent.phone = _this.phoneObject;

        this.studentStore.getExistingStudentsNew(_this.registration).then((response) => {
            _this.existingStudents = response.data.students;
            //console.log(_this.existingStudents.length,_this.existingStudents,response.data.students);
            if(_this.existingStudents.length > 0){
                // console.log('greater',_this.existingStudents.length);
                _this.showAddStudentLink = true;
                if(response.data.parent)
                {
                    _this.registration.parent = response.data.parent
                }
            }
            else if(_this.existingStudents.length == 0){
                // console.log('equal',_this.existingStudents.length);
                _this.showAddStudentLink = true;
                _this.addNewStudentHandler();
            }
        })

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
    getAvailableTimeSlots(){
      let _this = this;
      _this.resetSelectedSlot();
      _this.available_time_slots = ''
      axios.post('/forms/getAvailableTimeSlots', _this.registration)
        .then(response => {
          _this.available_time_slots = response.data.data.available_time_slots;
          _this.flag_to_get_available_call_slots = true;
        }).catch(error =>{
      })
    },
    addFreeSession(){
        let _this = this;
        _this.error = '';
        _this.registration.parent.phone = _this.phoneObject;
        _this.registration.partner_code = _this.partner_code;
        _this.registration.isPaymentSuccess = true;
        return new Promise((resolve, reject) =>{
            axios({
                method: "post",
                url: "/forms/storeFreeTrial",
                data: _this.registration
            }).then(response => {
                resolve(response)
                _this.registration.student.id = response.data.data.user.id;
                if(_this.registration.class_type === 'group') {
                    _this.step = _this.step + 2;
                }
            }).catch(error => {
                //console.log(error);
                reject(error)
            })
        })
    },
    async redirectToCheckout() {

        console.log('Stripe:', Stripe); // Should not be undefined
        try {
            let fetchSession = '';
            const fetchClientSecret = async () => {
            this.registration.totalAmount = this.private_session_fee;
            const response = await axios.post('/forms/checkout',{
                registration:this.registration,
                coupon:this.coupons,
                // plan_id:this.planId,
                // type:'trial',
                type:'trial',
                mode:'trial',
            });

            //console.log(response.data.error);
            if (response.data.error) {
                this.stripe_error = response.data.error;
            }

            this.next();
            console.log('After next(), step is now:', this.step);
            const clientSecret = response.data.fetchClientSecret;
            fetchSession = response.data.fetchSession;
            this.registration.parent = response.data.parent;
            this.registration.student = response.data.student;
            return clientSecret;
            };

            const handleComplete = async () => {
                this.checkout.destroy()
                await this.checkStatus(fetchSession);
            }

            if (this.checkout) {
                this.checkout.destroy();
            }

            this.checkout = await stripe.initEmbeddedCheckout({
                fetchClientSecret,
                onComplete: handleComplete
            });

            // Add a small delay to ensure DOM is ready
            // await new Promise(resolve => setTimeout(resolve, 100));

            // Mount Checkout
            console.log('Attempting to mount to #checkout-mobile, element exists:', );
            this.checkout.mount('#checkout');
            console.log('Stripe mounted successfully');
        } catch (error) {
            //console.error('Error:', error);
            this.stripe_error = error;
        }
    },
    async checkStatus(sessionId){
        const response = await axios.post('/forms/check_payment_status',{
            session_id: sessionId,
        });

        if (response.data.error) {
            this.stripe_error = response.data.error;
            return;
        }

        //console.log(response.data,response.data.payment_status);

        if (response.data.payment_status == 'open') {
            // window.replace('http://localhost:4242/checkout.html')
        } else if (response.data.payment_status == 'complete') {
            this.registration.isPaymentSuccess = true;
            if(!this.registration.selectTaskClassLater){
                this.addFreeSession().then((response) => {
                    this.next();
                }).catch(error => {
                //
                })
            }
        }
    },
  },
  head() {
    return {
    }
  }
}
</script>

<style scoped>
.MyCardElement {
  @apply px-2 py-3 my-2 sm:text-sm border-gray-100 bg-gray-100 rounded-full
}
</style>
