<template>
  <div class="min-h-screen bg-gray-50">
    <div id="monthly-subscription-mobile" class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden">
      <!-- Mobile Header -->
      <div class="bg-white px-4 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
          <button v-if="step > 0" @click="back" class="p-1.5 hover:bg-gray-100 rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <div v-else class="w-8"></div>

          <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m7.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <h1 class="text-base font-medium text-gray-900">Monthly Subscription</h1>
          </div>

          <div class="w-8"></div>
        </div>

        <!-- Progress Steps -->
        <div class="flex items-center justify-center mt-4 space-x-1">
          <div v-for="n in 5" :key="n" class="flex items-center">
            <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-medium"
                 :class="step >= n ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-500'">
              {{ n }}
            </div>
            <div v-if="n < 5" class="w-4 h-0.5 mx-1"
                 :class="step > n ? 'bg-blue-500' : 'bg-gray-200'"></div>
          </div>
        </div>

        <!-- Step Labels -->
        <div class="flex justify-center mt-2">
          <span class="text-xs text-gray-600">
            {{ stepLabels[step] || 'Complete' }}
          </span>
        </div>
      </div>

      <!-- Step Content -->
      <div class="flex-1 overflow-hidden">
        <transition :name="slideAnimation" mode="out-in">
          <div :key="step" class="p-4 h-full flex flex-col">
            <!-- Step 0: Plan Selection -->
            <section v-if="step === 0" class="flex-1 flex flex-col">
              <div class="text-center mb-4">
                <p class="text-sm text-gray-600">Choose your subscription plan</p>
              </div>

              <div class="space-y-4 flex-1">
                <!-- Plan Options -->
                <div class="space-y-3">
                  <div v-for="plan in plans" :key="plan.value"
                       @click="switchPlan(plan.value)"
                       class="p-3 border-2 rounded-lg cursor-pointer transition-all"
                       :class="selectedPlan === plan.value ? 'border-blue-500 bg-blue-50' : 'border-gray-200 hover:border-gray-300'">
                    <div class="flex justify-between items-center">
                      <div>
                        <h4 class="text-sm font-medium text-gray-900">{{ plan.label }}</h4>
                        <p class="text-xs text-gray-600 mt-1">{{ plan.discount }} off Classes</p>
                      </div>
                      <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                           :class="selectedPlan === plan.value ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div v-if="selectedPlan === plan.value" class="w-2 h-2 bg-white rounded-full"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Location Selection -->
                <div>
                  <label class="form-label">
                    Location <span class="text-red-500">*</span>
                  </label>
                  <select v-model="registration.location_id" @change="handleLocationSelection" required
                          class="form-select">
                    <option value="" disabled>Select Location</option>
                    <option v-for="location in locations.locations" :key="location.id" :value="location.id">
                      {{ location.location_name }}
                    </option>
                  </select>
                </div>

                <!-- Topic Selection -->
                <div>
                  <label class="form-label">
                    Topic <span class="text-red-500">*</span>
                  </label>
                  <select v-model="registration.topic_id" @change="handleTopicSelection" required
                          class="form-select">
                    <option value="" disabled>Select Topic</option>
                    <option v-for="topic in topics.topics" :key="topic.id" :value="topic.id">
                      {{ topic.name }}
                    </option>
                  </select>
                </div>

                <!-- Timeslot Duration -->
                <div>
                  <label class="form-label">
                    Timeslot Duration <span class="text-red-500">*</span>
                  </label>
                  <select v-model="registration.timeslot_duration" @change="reloadData" required
                          class="form-select">
                    <option value="" disabled>Select Timeslot Duration</option>
                    <option value="morning">Morning - (8 am -12 pm)</option>
                    <option value="afternoon">Afternoon - (12 pm - 4 pm)</option>
                    <option value="evening">Evening (4 pm - 9 pm)</option>
                  </select>
                </div>

                <!-- Class Type -->
                <div>
                  <label class="form-label">Class Type <span class="text-red-500">*</span></label>
                  <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                      <input type="radio" v-model="registration.class_type" value="Small Group" class="form-radio">
                      <span class="text-sm">Small Group (3:1)</span>
                    </label>
                    <label class="flex items-center space-x-2">
                      <input type="radio" v-model="registration.class_type" value="Private" class="form-radio">
                      <span class="text-sm">Private (1:1)</span>
                    </label>
                  </div>
                </div>

                <!-- Class Frequency -->
                <div>
                  <label class="form-label">Class Frequency <span class="text-red-500">*</span></label>
                  <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                      <input type="radio" v-model="registration.class_per_week" :value="1" class="form-radio">
                      <span class="text-sm">Once per week</span>
                    </label>
                    <label class="flex items-center space-x-2">
                      <input type="radio" v-model="registration.class_per_week" :value="2" class="form-radio">
                      <span class="text-sm">Twice per week</span>
                    </label>
                  </div>
                </div>
              </div>

              <div class="mt-6">
                <button @click="next" :disabled="!isStep0Valid"
                        class="form-button form-button-primary">
                  Next
                </button>
              </div>
            </section>

            <!-- Step 1: Schedule -->
            <section v-if="step === 1" class="flex-1 flex flex-col">
              <div class="text-center mb-4">
                <h3 class="text-base font-medium text-gray-900 mb-1">Select Your Class Schedule</h3>
                <p class="text-xs text-gray-600">Choose {{ registration.class_per_week }} weekly time slot(s)</p>
                <p v-if="!allSlotsSelected" class="text-red-500 text-xs">
                  Please select {{ registration.class_per_week === 1 ? 'one class' : 'two classes' }}
                </p>
              </div>

              <div class="flex-1 space-y-4">
                <!-- Calendar -->
                <div class="bg-white rounded-lg">
                  <vue-cal
                    style="height: 240px"
                    @view-change="ready"
                    @ready="ready"
                    :time="false"
                    active-view="month"
                    :disable-views="['years', 'year', 'week', 'day']"
                    hide-view-selector
                    xsmall
                    :selected-date="registration.selected_date_raw"
                    @cell-focus="dateClicked"
                    :disable-days="actualDays"
                  />
                </div>

                <!-- Time Slots -->
                <div v-if="registration.selected_date" class="space-y-3">
                  <div class="text-center">
                    <h4 class="text-blue-500 font-medium text-sm">
                      {{ filters.day_date(registration.selected_date_raw) }}
                      ({{ filters.format_time_zone(timezone) }})
                    </h4>
                  </div>

                  <div class="space-y-2 max-h-40 overflow-y-auto">
                    <template v-for="(slot, index) in available_time_slots" :key="index">
                      <div v-if="registration.selected_date && slot">
                        <button
                          @click="selectClassHandler(slot)"
                          type="button"
                          class="w-full px-3 py-2.5 rounded-lg font-medium transition-colors text-sm"
                          :class="
                            isSlotSelected(slot)
                              ? 'bg-blue-500 text-white border-2 border-blue-500'
                              : 'bg-blue-50 text-blue-600 border-2 border-transparent hover:border-blue-200'
                          "
                        >
                          {{ slot.slot_display }}
                          <div class="text-xs">
                            {{ slot.teacher.full_name }}
                          </div>
                        </button>
                      </div>
                    </template>

                    <p v-if="!available_time_slots || available_time_slots.length === 0"
                       class="text-center text-red-500 py-3 text-sm">
                      {{ notification }}
                    </p>
                  </div>
                </div>

                <div v-else class="flex items-center justify-center py-6">
                  <p class="text-gray-500 text-center text-sm" v-html="notification"></p>
                </div>

                <!-- Selected Classes -->
                <div v-if="registration.selectedTaskClasses.length > 0">
                  <h4 class="text-sm font-medium text-gray-700">Selected Classes:</h4>
                  <div class="mt-6 grid grid-cols-1 md:grid-cols-2 md:gap-2">
                    <div v-for="(slot,index) in registration.selectedTaskClasses" :key="index">
                      <div class="flex items-center px-0 md:px-10">
                        <div class="w-full m-1 cursor-pointer space-y-2 md:space-y-0 md:space-x-2 inline-flex items-center justify-center px-2 py-2 text-sm border border-blue-500 rounded-full text-white bg-blue-500 hover:bg-blue-600 focus:outline-none ">
                          <span>{{filters.date_format(slot.date)}}, {{slot.slot_display}}</span>
                        </div>
                        <div title="Remove selected class">
                          <svg @click="deleteSlot(slot)" class="w-6 h-6 text-red-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-6">
                <button @click="submitStepOne"
                        :disabled="!allSlotsSelected"
                        class="form-button form-button-primary">
                  Next
                </button>
              </div>
            </section>

            <!-- Step 2: Student Info -->
            <section v-if="step === 2" class="flex-1 flex flex-col">
              <div class="text-center mb-4">
                <h3 class="text-base font-medium text-gray-900 mb-1">Student Information</h3>
              </div>

              <div class="flex-1 space-y-4">
                <!-- Phone Number -->
                <div>
                  <label class="form-label">
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
                    placeholder="Phone Number"
                    class="phone-input-wrapper"
                  />
                  <small v-if="phoneError" class="text-red-500 block mt-1">Please enter a valid phone number</small>
                </div>

                <!-- Email -->
                <div>
                  <label class="form-label">
                    Email <span class="text-red-500">*</span>
                  </label>
                  <input
                    type="email"
                    placeholder="Email"
                    v-model="registration.parent.email"
                    required
                    class="form-input"
                    @blur="validateEmail"
                  />
                  <small v-if="emailError" class="text-red-500 block mt-1">Please enter a valid email</small>
                </div>

                <!-- Student Selection -->
                <div v-if="existingStudents.length">
                  <div class="mb-3">
                    <label class="form-label">
                      Choose a Student <span class="text-red-500">*</span>
                    </label>
                    <p class="text-xs text-gray-500">
                      Select an existing student below or add new
                    </p>
                  </div>

                  <div class="space-y-3">
                    <select
                      v-model="registration.student"
                      @change="handleStudentSelection"
                      required
                      class="form-select"
                    >
                      <option value="" disabled>Select a student</option>
                      <option
                        v-for="student in existingStudents"
                        :key="student.id"
                        :value="student"
                      >
                        {{ student.full_name }}
                      </option>
                    </select>

                    <button
                      type="button"
                      @click="addNewStudentHandler"
                      class="add-new-student-button"
                    >
                      <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                      </svg>
                      Add a New Student
                    </button>
                  </div>
                </div>

                <!-- New Student Form -->
                <div v-if="registration.addNewStudent || !existingStudents.length" class="space-y-3">
                  <div>
                    <label class="form-label">
                      Student Name <span class="text-red-500">*</span>
                    </label>
                    <input
                      type="text"
                      v-model="registration.student.full_name"
                      required
                      placeholder="Enter student's full name"
                      class="form-input"
                      @blur="validateStudentName"
                    />
                    <small v-if="studentNameError" class="text-red-500 block mt-1">Please enter student's name</small>
                  </div>

                  <div>
                    <label class="form-label">
                      Age <span class="text-red-500">*</span>
                    </label>
                    <input
                      type="number"
                      v-model="registration.student.age"
                      required
                      placeholder="Enter student's age"
                      min="5"
                      max="18"
                      class="form-input"
                      @blur="validateStudentAge"
                    />
                    <small v-if="studentAgeError" class="text-red-500 block mt-1">Please enter a valid age (5-18)</small>
                  </div>
                </div>

                <!-- Ad source field - only show for new students without ID -->
                <div v-if="!registration.student.id">
                  <label class="form-label">
                    How did you hear about us? <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="registration.ad_source"
                    type="text"
                    required
                    placeholder="e.g. Google, Friend, Social Media"
                    class="form-input"
                  />
                </div>
              </div>

              <div class="mt-6">
                <button
                  @click="submitStepTwo"
                  :disabled="!isStep2Valid"
                  class="form-button form-button-primary"
                >
                  Next
                </button>
              </div>
            </section>

            <!-- Step 3: Confirmation -->
            <section v-if="step === 3" class="flex-1 flex flex-col">
              <div class="text-center mb-4">
                <h3 class="text-base font-medium text-gray-900 mb-1">
                  Confirm Your Subscription
                </h3>
                <p class="text-xs text-gray-600">Review your details before proceeding to payment</p>
              </div>

              <div class="flex-1 space-y-4">
                <div class="bg-gray-50 rounded-lg p-3 space-y-1.5 text-sm">
                  <div class="flex justify-between">
                    <span class="text-gray-600">Plan:</span>
                    <span class="font-medium">{{ selectedPlanLabel }} Subscription</span>
                  </div>

                  <div v-for="(slot, index) in registration.selectedTaskClasses" :key="index">
                    <div class="border-t border-gray-200 pt-2 mt-2">
                      <div class="flex justify-between">
                        <span class="text-gray-600">Class {{ index + 1 }}:</span>
                        <span class="font-medium">{{ filters.day_date(slot.date) }}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="text-gray-600">Time:</span>
                        <span class="font-medium">{{ slot.slot_display }}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="text-gray-600">Teacher:</span>
                        <span class="font-medium">{{ slot.teacher.full_name }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="flex justify-between">
                    <span class="text-gray-600">Location:</span>
                    <span class="font-medium">{{ registration.location.location_name }}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Timeslot Duration:</span>
                    <span class="font-medium">{{ formattedTimeslotDuration }}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Student:</span>
                    <span class="font-medium">{{ registration.student.full_name }}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-medium">{{ registration.parent.email }}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-medium">{{ formattedPhoneNumber }}</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Amount:</span>
                    <span class="font-medium">${{ total_amount }}/{{ billingCycleText }}</span>
                  </div>
                </div>

                <div class="flex items-center justify-center space-x-2">
                  <input
                    type="checkbox"
                    v-model="termsAndConditions"
                    class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-500"
                  />
                  <label class="text-xs text-gray-600">
                    I agree to the
                    <a :href="drive_link" class="text-blue-500 underline" target="_blank">terms and conditions</a>
                  </label>
                </div>
              </div>

              <div class="mt-6">
                <button
                  :disabled="!termsAndConditions"
                  @click="redirectToCheckout"
                  class="form-button form-button-primary"
                >
                  Subscribe Now
                </button>
              </div>
            </section>

            <!-- Step 4: Payment -->
            <section v-show="step === 4" class="payment-section flex-1 flex flex-col">
              <div class="flex-1 space-y-4 min-h-80">
                <div
                  v-if="stripe_error"
                  class="bg-red-50 border border-red-200 rounded-lg p-3 mb-3"
                >
                  <p class="text-red-600 text-xs">
                    {{ stripe_error }}
                  </p>
                </div>

                <div id="checkout" class="flex-1">
                  <!-- Stripe will mount the payment form here -->
                </div>
              </div>
            </section>

            <!-- Step 5: Success -->
            <section v-if="step === 5" class="flex-1 flex flex-col">
              <div class="text-center space-y-4 flex-1">
                <div class="w-12 h-12 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-600">Subscription Confirmed!</h3>
                <p class="text-gray-600 text-sm">
                  You successfully subscribed to weekly classes.
                </p>

                <div class="bg-gray-50 rounded-lg p-3 mt-4 text-left space-y-1.5 text-xs">
                  <div v-for="(slot, index) in registration.selectedTaskClasses" :key="index">
                    <p>
                      <span class="font-medium">Class {{ index + 1 }}:</span>
                      {{ filters.day_date(slot.date) }}
                    </p>
                    <p>
                      <span class="font-medium">Time:</span>
                      {{ slot.slot_display }}
                    </p>
                    <p>
                      <span class="font-medium">Teacher:</span>
                      {{ slot.teacher.full_name }}
                    </p>
                    <div class="border-b border-gray-200 pb-2 mb-2"></div>
                  </div>
                  <p>
                    <span class="font-medium">Timezone:</span>
                    {{ filters.format_time_zone(timezone) }}
                  </p>
                  <p>
                    <span class="font-medium">Location:</span>
                    {{ registration.location.location_name }}
                  </p>
                  <p>
                    <span class="font-medium">Student:</span>
                    {{ registration.student.full_name }}
                  </p>
                </div>

                <a
                  href="https://www.codewithus.com/school-program#freeform"
                  class="inline-block mt-4 text-blue-500 underline font-medium text-sm"
                >
                  How to access your weekly classes
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
import { useCountriesStore } from '../store/countries';
import { useLocationsStore } from '../store/locations';
import { useFiltersStore } from '../store/filtersStore';
import { useTopics } from '../store/topics';
import { useErrorStore } from '../store/errorsStore';
import { useStudentsStore } from '../store/studentsStore';
import { useNotificationStore } from '../store/notificationStore';
import VueCal from 'vue-cal';
import 'vue-cal/dist/vuecal.css';
import recaptcha from "../../../mixins/recaptcha";
import partner_code_cookie from "../../../mixins/partner_code_cookie";
import moment from 'moment';

let stripe = Stripe(
    "pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69"
);

export default {
    components: { VueCal },
    props: {
      private_classes_discount_price: {
        type: Number,
        default: 0
      },
      group_classes_discount_price: {
        type: Number,
        default: 0
      },
      drive_link: {
        type: String,
        default: ''
      }
    },
    mixins: [partner_code_cookie, recaptcha],
    setup() {
        const countries = useCountriesStore();
        const locations = useLocationsStore();
        const filters = useFiltersStore();
        const topics = useTopics();
        const errors = useErrorStore();
        const notify = useNotificationStore();
        const studentStore = useStudentsStore();
        return {
            countries,
            locations,
            topics,
            filters,
            errors,
            notify,
            studentStore,
        };
    },
    data() {
        return {
            stripe_error: "",
            checkout: null,
            termsAndConditions: false,
            slideAnimation: "slide-left",
            step: 0,
            stepLabels: [
                "Plan Selection",
                "Schedule",
                "Student Info",
                "Confirm",
                "Payment"
            ],
            existingStudents: [],
            phone: "",
            phoneObject: null,
            phoneError: false,
            emailError: false,
            studentNameError: false,
            studentAgeError: false,
            source: null,
            config: null,
            coupon: {
                id: '',
                isValid: false,
                coupon_error: '',
                amount_off: 0,
                loader: false,
            },
            has_siblings: false,
            idempotent_id: '',
            private_class_price_per_class: parseInt(this.private_classes_discount_price),
            group_class_price_per_class: parseInt(this.group_classes_discount_price),
            registration: {
                phone: null,
                totalAmount: 0,
                last_date_to_put_in_class: moment().add(16, 'days'),
                payment_type: 'monthly',
                isPaymentSuccess: false,
                type: 'subscriptions',
                registration_type: 'Monthly Recurring Subscriptions',
                location_id: "",
                location: null,
                topic: null,
                topic_id: "",
                timeslot_duration: "",
                class_type: "Small Group",
                class_per_week: 1,
                billing_cycle: 1, // 1=monthly, 3=quarterly, 6=semi-annual
                selected_date: "",
                selected_date_raw: "",
                addNewStudent: false,
                selectedTaskClasses: [],
                student: {
                    id: "",
                    full_name: "",
                    age: "",
                    grade: "",
                    dob: "",
                    postal_address: "",
                    homework_type: "",
                    homework_types: [],
                    email: ""
                },
                parent: {
                    id: "",
                    full_name: "",
                    dial_code: "",
                    phone_number: "",
                    email: "",
                    phone: null,
                    stripe_id: ""
                },
                amount_subtotal: 0,
                payment_payload: null,
                payment_id: "",
                plan_id: "",
                stripe_id: null,
                brand: 'codewithus',
                isEligible: 'ineligible',
                selectClassLater: false,
                selectClassLaterMessage: "",
                selected_plan: 'beginner',
                class_per_month: 4,
                referral: '',
                address: '',
                starts_at: '',
                time_zone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                ad_source: "",
                expectations: "",
                paymentResponse: [],
                slot: {
                    existing: false,
                    slot: "",
                    slot_display: "",
                    space: "",
                    space_count: 0,
                    taskclass: { id: 0 },
                    teacher: { id: 0 }
                }
            },
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: 'form-input',
                    placeholder: 'Phone Number',
                    autocomplete: 'tel'
                },
                dropdownOptions: {
                    showDialCodeInSelection: true,
                    showFlags: true,
                    showSearchBox: true
                },
                validationOptions: {
                    showHelperText: true,
                    required: true
                }
            },
            preferredCountries: ['US', 'GB', 'CA', 'CN', 'IN'],
            available_time_slots: [],
            calendar_start_date: "",
            calendar_end_date: "",
            disableDays: [],
            allowedDays: [],
            actualDays: [],
            notification: "",
            holidays_for_scheduling: JSON.parse(localStorage.getItem("holidays")) || [],
            discount_two_class_per_week: 10,
            discounted_price: '',
            selectedPlan: "monthly",
            plans: [
                { value: "monthly", label: "Monthly", discount: "20%" },
                { value: "quarterly", label: "Quarterly", discount: "30%" },
                { value: "semi", label: "Semi Annually", discount: "35%" },
            ],
            sliderPosition: {
                width: 0,
                translateX: 0,
            },
        };
    },
    computed: {
        allSlotsSelected() {
            return this.registration.selectedTaskClasses.length === parseInt(this.registration.class_per_week);
        },
        studentId() {
            return this.registration.student?.id || '';
        },
        billing_cycle_discount() {
            let discount = 0;
            if (this.registration.billing_cycle === 3) {
                discount = 10;
            }
            if (this.registration.billing_cycle === 6) {
                discount = 15;
            }
            return (discount / 100) * (this.sub_amount - this.discount_extra);
        },
        sub_amount() {
            return parseFloat(this.price_per_class * this.registration.class_per_month * this.registration.class_per_week * this.registration.billing_cycle);
        },
        discount_extra() {
            let discount = 0;
            if (this.registration.class_per_week > 1) {
                discount = parseFloat((this.discount_two_class_per_week / 100) * this.sub_amount);
            }
            return discount;
        },
        classPerWeekText() {
            return this.registration.class_per_week > 1 ? 'Twice a Week' : 'Once a Week';
        },
        net_price() {
            return Math.floor((this.sub_amount - this.discount_extra - this.billing_cycle_discount));
        },
        discount() {
            let discount = 0;
            if (this.registration.isEligible === 'eligible') {
                discount = .1 * this.net_price;
            }
            return discount;
        },
        total_amount() {
            let total = 0;
            total = parseFloat(this.net_price - this.discount - this.coupon.amount_off).toFixed(2);
            this.discounted_price = (Math.ceil(total / .8) - total);
            return total;
        },
        price_per_class() {
            if (this.registration.class_type === 'Private') {
                return this.private_class_price_per_class;
            } else {
                return this.group_class_price_per_class;
            }
        },
        billingCycleText() {
            switch(this.registration.billing_cycle) {
                case 1: return 'month';
                case 3: return 'quarter';
                case 6: return '6 months';
                default: return 'month';
            }
        },
        selectedPlanLabel() {
            return this.selectedPlan.charAt(0).toUpperCase() + this.selectedPlan.slice(1);
        },
        formattedTimeslotDuration() {
            if (!this.registration.timeslot_duration) return '';
            const duration = this.registration.timeslot_duration;
            return duration.charAt(0).toUpperCase() + duration.slice(1);
        },
        formattedPhoneNumber() {
            if (!this.phoneObject || !this.registration.parent?.phone_number) return '';
            return `${this.phoneObject.countryCallingCode} ${this.registration.parent.phone_number}`;
        },
        isStep0Valid() {
            return this.registration.location_id &&
                   this.registration.topic_id &&
                   this.registration.timeslot_duration &&
                   this.registration.class_type &&
                   this.registration.class_per_week;
        },
        isStep2Valid() {
            // For debugging purposes
            console.log("Validating Step 2 fields:");
            console.log("- Student name:", this.registration.student?.full_name);
            console.log("- Student age:", this.registration.student?.age);
            console.log("- Email:", this.registration.parent?.email);
            console.log("- Phone:", this.registration.parent?.phone_number);
            console.log("- Phone Error:", this.phoneError);
            console.log("- Email Error:", this.emailError);
            console.log("- Student Name Error:", this.studentNameError);
            console.log("- Student Age Error:", this.studentAgeError);

            return this.registration.student?.full_name &&
                   this.registration.student?.age &&
                   this.registration.parent?.email &&
                   this.registration.parent?.phone_number &&
                   !this.phoneError &&
                   !this.emailError &&
                   !this.studentNameError &&
                   !this.studentAgeError;
        },
        isSlotSelected() {
            return (slot) => {
                return this.registration.selectedTaskClasses.some(s =>
                    s.slot === slot.slot && s.teacher.id === slot.teacher.id
                );
            };
        }
    },
    watch: {
        step(newVal, oldVal) {
            this.slideAnimation = newVal > oldVal ? "slide-left" : "slide-right";
        },
        'registration.billing_cycle'(newVal) {
            this.handleBillingCycleChange();
        },
        'registration.class_type'() {
            this.getAvailableTimeSlots();
        },
        'registration.class_per_week'() {
            this.getAvailableTimeSlots();
        }
    },
    created() {
        this.private_class_price_per_class = parseInt(this.private_classes_discount_price);
        this.group_class_price_per_class = parseInt(this.group_classes_discount_price);

        this.notificationMessage();
        this.countries.get();
        this.locations.fetchLocations();
        this.topics.fetchTopics();
        this.initRegistrationObjects();

        this.source = axios.CancelToken.source();
        this.config = { cancelToken: this.source.token };

        const interval = parseInt(localStorage.getItem('weekly_interval'), 10);
        const validIntervals = [1, 3, 6];

        if (interval && validIntervals.includes(interval)) {
            this.registration.billing_cycle = interval;
            const planMap = {
                1: 'monthly',
                3: 'quarterly',
                6: 'semi',
            };
            const planValue = planMap[interval];
            this.selectedPlan = planValue;
            localStorage.removeItem('weekly_interval');
        }
    },
    mounted() {
        this.$nextTick(() => {
            this.updateSlider();
        });
    },
    beforeUnmount() {
        if (this.checkout) {
            this.checkout.destroy();
        }
        if (this.source) {
            this.source.cancel('Component unmounted');
        }
    },
    methods: {
        initRegistrationObjects() {
            this.studentObject();
            this.parentObject();
        },

        studentObject() {
            this.registration.student = {
                id: "",
                full_name: "",
                age: "",
                grade: "",
                email: ""
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
                phone: null,
                stripe_id: ""
            };
        },
        notificationMessage() {
            if (this.loader) {
                this.notification = "Please wait while we load available classes...";
            } else if (Object.keys(this.errors.errors).length) {
                this.notification = "Please fill in all required fields";
            } else {
                this.notification = `Please select a date between ${this.filters.date_format(new Date().addDays(3).format())}
                and ${this.filters.date_format(new Date().addDays(16).format())}`;
            }
        },
        ready(e) {
            this.disableDays = [];
            this.calendar_start_date = moment(e.startDate);
            this.calendar_end_date = moment(e.endDate);
            this.disableDays = this.getDaysBetweenDates(moment(e.startDate), moment(e.endDate));
            this.allowedDays = this.getDaysBetweenDates(moment().add(3, 'days'), moment().add(365, 'days'));

            this.actualDays = _.difference(this.disableDays, this.allowedDays);

            if (this.holidays_for_scheduling.length) {
                this.actualDays = this.actualDays.concat(this.holidays_for_scheduling);
            }
        },
        getDaysBetweenDates(startDate, endDate) {
            const dates = [];
            const now = startDate.clone();

            while (now.isSameOrBefore(endDate)) {
                dates.push(new Date(now).format());
                now.add(1, 'days');
            }
            return dates;
        },
        reloadData() {
            if (this.registration.topic_id &&
                this.registration.location_id &&
                this.registration.class_type &&
                this.registration.class_per_week) {

                if (!this.registration.selected_date_raw) {
                    this.nextAvailableDate();
                } else {
                    this.getAvailableTimeSlots();
                }
            }
        },
        nextAvailableDate() {
            const date = new Date().addDays(3).format();
            this.registration.selected_date = this.filters.date_format(date);
            this.registration.selected_date_raw = date;
            this.available_time_slots = [];
            this.getAvailableTimeSlots();
        },
        deleteSlot(slot) {
            this.registration.selectedTaskClasses = this.registration.selectedTaskClasses.filter(s =>
                !(s.slot === slot.slot && s.teacher.id === slot.teacher.id)
            );
        },
        handleTopicSelection() {
            const topic = this.topics.topics.find(t => t.id === this.registration.topic_id);
            this.registration.topic = topic || null;
            this.reloadData();
        },
        handleLocationSelection() {
            const location = this.locations.locations.find(l => l.id === this.registration.location_id);
            this.registration.location = location || null;
            this.reloadData();
        },
        selectClassHandler(slot) {
            if (this.registration.selectedTaskClasses.length >= parseInt(this.registration.class_per_week)) {
                this.notify.setMessage("You have selected the maximum number of classes!");
            } else if (this.isSlotSelected(slot)) {
                this.notify.setMessage("You have already selected this slot!");
            } else {
                this.registration.selectedTaskClasses.push(slot);
            }
        },
        dateClicked(e) {
            const currentSelectedDate = this.registration.selected_date_raw || new Date().format();
            this.registration.selected_date_raw = e;
            const enteredDate = new Date(e).format();
            const today = new Date().addDays(1).format();
            const startDate = new Date().addDays(3).format();
            const endDate = new Date().addDays(16).format();
            const endDatePlusOne = new Date().addDays(17).format();

            if (!moment(enteredDate).isBetween(today, endDatePlusOne)) {
                this.notify.setMessage(`Select date between ${this.filters.date_format(startDate)} and ${this.filters.date_format(endDate)}`);
                setTimeout(() => {
                    this.registration.selected_date_raw = currentSelectedDate;
                }, 300);
                return false;
            }

            if (!this.loader) {
                this.registration.selected_date = this.filters.date_format(e);
                this.available_time_slots = [];
                this.getAvailableTimeSlots();
            } else {
                this.notify.setMessage("Please wait while we load available slots...");
                setTimeout(() => {
                    this.registration.selected_date_raw = currentSelectedDate;
                }, 300);
            }
        },
        async getAvailableTimeSlots() {
            if (!this.registration.location_id ||
                !this.registration.topic_id ||
                !this.registration.timeslot_duration) {
                return;
            }

            try {
                this.available_time_slots = [];
                const response = await axios.post(
                    "/forms/getNewSubscriptionAvailableTimeSlots",
                    this.registration,
                    this.config
                );
                this.available_time_slots = response.data.available_time_slots || [];
            } catch (error) {
                console.error("Error fetching time slots:", error);
                this.notify.setMessage("Error loading available time slots");
            }
        },
        next() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            this.step++;
        },
        back() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            this.step > 0 ? this.step-- : "";
        },
        handleStudentSelection() {
            this.registration.addNewStudent = false;
        },
        addNewStudentHandler() {
            if(this.existingStudents.length){
                this.registration.addNewStudent = !this.registration.addNewStudent;
                this.studentStore.existingStudent = !this.studentStore.existingStudent;
                this.registration.student = {id : '',full_name : '',age : '',grade: ''};
            } else {
                this.registration.addNewStudent = true;
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
        validateEmail() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const isValid = emailRegex.test(this.registration.parent?.email || '');
            this.emailError = !isValid;
            console.log("Email validation:", this.registration.parent?.email, "Valid:", isValid);
            return isValid;
        },

        validateStudentName() {
            const isValid = !!this.registration.student?.full_name?.trim();
            this.studentNameError = !isValid;
            console.log("Student name validation:", this.registration.student?.full_name, "Valid:", isValid);
            return isValid;
        },

        validateStudentAge() {
            const age = parseInt(this.registration.student?.age);
            const isValid = !isNaN(age) && age >= 5 && age <= 18;
            this.studentAgeError = !isValid;
            console.log("Student age validation:", age, "Valid:", isValid);
            return isValid;
        },
        onPhoneNumberEnter() {
            this.fetchExistingStudents();
        },
        async fetchExistingStudents() {
            if (!this.phoneObject?.nationalNumber) {
                console.log("No phone number available");
                return;
            }

            try {
                console.log("Fetching existing students with phone:", this.phoneObject.nationalNumber);
                this.existingStudents = [];
                const response = await this.studentStore.getExistingStudentsNew(this.registration);
                console.log("Existing students response:", response.data);

                this.studentStore.students = response.data.students || [];
                this.studentStore.parent = response.data.parent || null;
                this.existingStudents = response.data.students || [];
                this.studentStore.addStudent = !response.data.parent;
                this.studentStore.existingStudent = !!response.data.parent;
                this.studentStore.students_count = response.data.students_count || 0;

                // Make sure we don't overwrite the phone number
                const currentPhone = this.registration.parent?.phone;
                const currentPhoneNumber = this.registration.parent?.phone_number;
                const currentDialCode = this.registration.parent?.dial_code;

                // Update parent info if available
                if (response.data.parent) {
                    this.registration.parent = response.data.parent;
                    // Restore phone info
                    this.registration.parent.phone = currentPhone;
                    this.registration.parent.phone_number = currentPhoneNumber;
                    this.registration.parent.dial_code = currentDialCode;
                }

                console.log("Parent after fetch:", this.registration.parent);
                this.registration.amount = this.net_price;

                if (this.existingStudents.length === 0) {
                    console.log("No existing students found, adding new student");
                    this.addNewStudentHandler();
                }
            } catch (error) {
                console.error("Error fetching existing students:", error);
                this.addNewStudentHandler();
            }
        },
        submitStepOne() {
            if (!this.allSlotsSelected) {
                this.notify.setMessage(`Please select ${this.registration.class_per_week} class(es)`);
            } else {
                this.next();
            }
        },
        async submitStepTwo() {
            let _this = this;
            _this.registration.parent.phone = _this.phoneObject;
            _this.registration.parent.phone_number = _this.phoneObject.nationalNumber;
            if (_this.registration.parent.full_name === '') {
                _this.registration.parent.full_name = _this.registration.student.full_name;
            }

            // Set parent name if empty
            if (!this.registration.parent.full_name) {
                this.registration.parent.full_name = this.registration.student.full_name;
            }

            console.log("All validations passed, submitting form", this.registration);
            try {
                await axios.post('/web/setSubscriptionFormStepTwo', this.registration);
                this.next();
            } catch (error) {
                console.error("Error submitting step 2:", error);
                this.notify.setMessage("Error saving your information. Please try again.");
            }
        },
        async redirectToCheckout() {
            try {
                let fetchSession = '';
                this.next();
                this.registration.totalAmount = this.net_price;
                const fetchClientSecret = async () => {
                const response = await axios.post('/forms/checkout',{
                    registration:this.registration,
                    coupon:this.coupon,
                    type:'subscription',
                    mode:'subscription',
                });

                if (response.data.error) {
                    this.stripe_error = response.data.error;
                    this.slackNotificationForStripeError(response.data.error);
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
                // Mount Checkout
                this.checkout.mount('#checkout');
            } catch (error) {
                this.stripe_error = error;
            }
        },
        async checkStatus(sessionId) {
            const response = await axios.post('/forms/check_payment_status',{
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
                data : this.registration,
              }).then((response)=>{
                  if(response.data.message==='Subscription booked successfully'){
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
              message : error,
              form : 'Subscription Form',
              user : _this.registration,
            },
          })
        },
        switchPlan(planValue) {
            this.selectedPlan = planValue;

            const billingCycleMap = {
                monthly: 1,
                quarterly: 3,
                semi: 6
            };

            const newCycle = billingCycleMap[planValue];
            if (this.registration.billing_cycle !== newCycle) {
                this.registration.billing_cycle = newCycle;
            }

            this.$nextTick(() => {
                const activeButton = document.querySelector(`button[data-plan="${planValue}"]`);
                if (activeButton) {
                    this.updateSlider(activeButton);
                }
            });
        },
        updateSlider(activeButton) {
            if (!activeButton) {
                activeButton = document.querySelector(`button[data-plan="${this.selectedPlan}"]`);
                if (!activeButton) return;
            }

            this.sliderPosition = {
                width: activeButton.offsetWidth,
                translateX: activeButton.offsetLeft
            };
        },
        handleBillingCycleChange() {
            const planMap = {
                1: 'monthly',
                3: 'quarterly',
                6: 'semi',
            };

            const planValue = planMap[this.registration.billing_cycle];
            if (planValue && planValue !== this.selectedPlan) {
                this.selectedPlan = planValue;
            }

            this.getAvailableTimeSlots();
        }
    }
};
</script>

<style scoped>
/* Base styles */
.form-button {
    width: 100%;
    padding: 0.875rem 1rem;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
}

.form-button-primary {
    background-color: #3b82f6;
    color: #ffffff;
}

.form-button-primary:hover:not(:disabled) {
    background-color: #2563eb;
}

.form-button-primary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background-color: #9ca3af;
}

.form-button-secondary {
    background-color: transparent;
    color: #3b82f6;
    border: 1px solid #3b82f6;
}

.form-button-secondary:hover {
    background-color: #eff6ff;
}

/* Form inputs */
.form-input {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    background-color: #f9fafb;
    transition: all 0.2s ease;
    color: #374151;
}

.form-input:focus {
    outline: none;
    border-color: #3b82f6;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-input::placeholder {
    color: #9ca3af;
}

.form-select {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    background-color: #f9fafb;
    transition: all 0.2s ease;
    color: #374151;
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1rem;
    padding-right: 3rem;
}

.form-select:focus {
    outline: none;
    border-color: #3b82f6;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
}

.form-radio {
    border: 1px solid #d1d5db;
    border-radius: 50%;
    width: 1rem;
    height: 1rem;
    appearance: none;
    -webkit-appearance: none;
    outline: none;
    cursor: pointer;
    transition: all 0.2s ease;
}

.form-radio:checked {
    background-color: #3b82f6;
    border-color: #3b82f6;
    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
    background-position: center;
    background-repeat: no-repeat;
    background-size: 0.5rem 0.5rem;
}

/* Phone input styling */
.phone-input-wrapper {
    margin-bottom: 0.5rem;
}

:deep(.vue-tel-input) {
    border-radius: 0.75rem !important;
    width: 100% !important;
    border: 1px solid #e5e7eb !important;
    background-color: #f9fafb !important;
}

:deep(.vue-tel-input:focus-within) {
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
}

:deep(.vue-tel-input.invalid-number) {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

:deep(.vti__input) {
    padding: 0.875rem 1rem !important;
    font-size: 0.875rem !important;
    border-radius: 0 0.75rem 0.75rem 0 !important;
    border: none !important;
    background-color: transparent !important;
    transition: all 0.2s !important;
    color: #374151 !important;
    width: 100% !important;
}

:deep(.vti__input:focus) {
    background-color: transparent !important;
    outline: none !important;
}

:deep(.vti__input::placeholder) {
    color: #9ca3af !important;
}

:deep(.vti__dropdown) {
    border-radius: 0.75rem 0 0 0.75rem !important;
    border: none !important;
    background-color: transparent !important;
    padding-left: 10px !important;
}

:deep(.vti__dropdown:hover) {
    background-color: #f3f4f6 !important;
}

:deep(.vti__dropdown-list) {
    border-radius: 0.75rem !important;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
    max-height: 300px !important;
    overflow-y: auto !important;
}

/* Compact calendar styling */
:deep(.vuecal__cell) {
    min-height: 32px !important;
    font-size: 0.75rem !important;
}

:deep(.vuecal__title) {
    font-size: 0.875rem !important;
    padding: 0.5rem !important;
}

.add-new-student-button {
    width: 100%;
    padding: 1rem;
    font-size: 0.875rem;
    border: 2px solid #3b82f6;
    border-radius: 0.75rem;
    background-color: #eff6ff;
    color: #3b82f6;
    font-weight: 500;
    transition: all 0.2s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.add-new-student-button:hover {
    background-color: #dbeafe;
    border-color: #2563eb;
}

.add-new-student-button:active {
    background-color: #bfdbfe;
}



.payment-section {
    min-height: 300px;
}

.invalid-phone :deep(.vue-tel-input) {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}
</style>
