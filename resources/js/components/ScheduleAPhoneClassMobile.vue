<template>
  <div class="min-h-screen bg-gray-50">
    <div id="phone-call-mobile" class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden">

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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <h1 class="text-lg font-medium text-gray-900">Schedule a Phone Call</h1>
          </div>

          <div class="w-10"></div>
        </div>

        <!-- Progress Steps -->
        <div class="flex items-center justify-center mt-6 space-x-2">
          <div v-for="n in 4" :key="n" class="flex items-center">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium"
                 :class="step >= n ? 'bg-blue-500 text-white' : step === n ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-500'">
              {{ n }}
            </div>
            <div v-if="n < 4" class="w-8 h-0.5 mx-2"
                 :class="step > n ? 'bg-blue-500' : 'bg-gray-200'"></div>
          </div>
        </div>

        <!-- Step Labels -->
        <div class="flex justify-center mt-2">
          <span class="text-sm text-gray-600">
            <template v-if="step === 1">Reason</template>
            <template v-else-if="step === 2">Date & Time</template>
            <template v-else-if="step === 3">Details</template>
            <template v-else-if="step === 4">Confirm</template>
          </span>
        </div>
      </div>

      <!-- Step Content -->
      <div class="flex-1 overflow-hidden">
        <transition :name="slide_animation" mode="out-in">
          <div :key="step" class="p-6 h-full flex flex-col">
            <!-- Step 1: Reason for Call -->
            <template v-if="step === 1">
              <div class="text-center mb-8">
                <p class="text-gray-600">Enter your phone number to select a phone call time.</p>
              </div>

              <div class="space-y-6 flex-1">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Reason for call <span class="text-red-500">*</span>
                  </label>
                  <select
                    v-model="phone_call.reason"
                    @change="reloadData"
                    required
                    class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  >
                    <option value="" disabled>Select Reason for Call</option>
                    <option v-for="reason in phone_class_reasons" :key="reason" :value="reason">{{reason}}</option>
                  </select>
                  <small v-if="error.errors.reason" class="text-red-500 mt-1 block">{{error.errors.reason}}</small>
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="next"
                  :disabled="!phone_call.reason"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Next
                </button>
              </div>
            </template>

            <!-- Step 2: Date & Time Selection -->
            <template v-else-if="step === 2">
              <div class="text-center mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Select Date</h3>
                <p class="text-red-500 text-sm" v-if="phone_call.reason">
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
                    :selected-date="phone_call.selected_date_raw"
                    @cell-focus="dateClicked"
                    :disable-days="actualDays"
                  > </vue-cal>
                </div>

                <!-- Time Slots -->
                <div v-if="phone_call.selected_date" class="space-y-4">
                  <div class="text-center">
                    <h4 class="text-blue-500 font-medium">
                      {{ filters.day_date(phone_call.selected_date_raw) }} ({{ filters.format_time_zone(user_time_zone) }})
                    </h4>
                  </div>

                  <div class="space-y-2 max-h-48 overflow-y-auto">
                    <template v-for="(slot, index) in available_time_slots" :key="index">
  <div v-if="phone_call.selected_date && slot && !slot.booked">
    <button
      @click="selectClassHandler(slot)"
      type="button"
      class="w-full p-4 rounded-lg font-medium transition-colors"
      :class="phone_call.slot.slot === slot.slot
        ? 'bg-blue-500 text-white border-2 border-blue-500'
        : 'bg-blue-50 text-blue-600 border-2 border-transparent hover:border-blue-200'"
    >
      {{ slot.slot }}
    </button>
  </div>
</template>

                    <p v-if="slots_not_available" class="text-center text-red-500 py-4">{{ slots_not_available }}</p>
                  </div>
                </div>

                <div v-else class="flex items-center justify-center py-8">
                  <p class="text-gray-500 text-center" v-html="notification"></p>
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="next"
                  :disabled="!phone_call.slot.slot_display"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Next
                </button>
              </div>
            </template>

            <!-- Step 3: Student Details -->
            <template v-else-if="step === 3">
            <div class="flex-1 space-y-6">
              <!-- Tab Navigation -->
              <div class="flex rounded-lg bg-gray-100 p-1">
                <button
                  type="button"
                  class="flex-1 py-2 px-4 rounded-md text-sm font-medium transition-colors"
                  :class="activeTab === 'class' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500'"
                  @click="activeTab = 'class'"
                >
                  Class Options
                </button>
                <button
                  type="button"
                  class="flex-1 py-2 px-4 rounded-md text-sm font-medium transition-colors"
                  :class="activeTab === 'student' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500'"
                  @click="activeTab = 'student'"
                >
                  Student Info
                </button>
              </div>

              <div v-if="activeTab === 'student'" class="space-y-6">
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
                  <small v-if="errors && errors.phone_number" class="text-red-500 mt-1 block">{{errors.phone_number}}</small>
                </div>

                <!-- Email -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                  </label>
                  <input
                    type="email"
                    placeholder="Email"
                    v-model="phone_call.student.email"
                    required
                    class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  >
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
                        v-model="phone_call.student"
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
                <div v-if="phone_call.addNewStudent || !existingStudents.length" class="space-y-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Student Name <span class="text-red-500">*</span>
                    </label>
                    <input
                      type="text"
                      v-model="phone_call.student.full_name"
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
                      v-model="phone_call.student.age"
                      required
                      class="w-full p-4 border border-gray-300 rounded-lg text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-auto pt-6">
              <button
                @click="submitStepTwo"
                :disabled="buttonLoader || !phone_call.student.full_name"
                class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
              >
                <span>Next</span>
              </button>
            </div>
            </template>

            <!-- Step 4: Confirmation -->
            <template v-else-if="step === 4">
              <div class="text-center mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Are you sure you want to book a phone call?</h3>
              </div>

              <div class="flex-1 space-y-6">
                <div class="bg-gray-50 rounded-lg p-6 space-y-4">
                  <div>
                    <span class="text-sm text-gray-500">Time:</span>
                    <p class="font-medium">{{filters.day_date(phone_call.selected_date_raw)}} {{ phone_call.slot.slot_display }} ({{filters.format_time_zone(user_time_zone)}})</p>
                  </div>

                  <div>
                    <span class="text-sm text-gray-500">Student Name:</span>
                    <p class="font-medium capitalize">{{phone_call.student.full_name}}</p>
                  </div>

                  <div>
                    <span class="text-sm text-gray-500">Email:</span>
                    <p class="font-medium">{{phone_call.student.email}}</p>
                  </div>

                  <div>
                    <span class="text-sm text-gray-500">Phone Number:</span>
                    <p class="font-medium">{{phoneObject.countryCallingCode}} {{phone_call.student.phone_number}}</p>
                  </div>
                </div>

                <small v-if="error" class="text-red-500 block text-center">{{errorMsg}}</small>
              </div>

              <div class="mt-auto pt-6 space-y-3">
                <button
                  @click="bookPhoneCallSlot"
                  :disabled="loader"
                  class="w-full bg-blue-500 text-white py-4 rounded-lg font-medium text-lg disabled:opacity-50 disabled:cursor-not-allowed hover:bg-blue-600 transition-colors"
                >
                  Book Phone Call
                </button>

                <button
                  @click="back"
                  type="button"
                  class="w-full bg-white text-blue-500 py-4 rounded-lg font-medium text-lg border border-blue-500 hover:bg-blue-50 transition-colors"
                >
                  Cancel
                </button>
              </div>
            </template>

            <!-- Step 5: Success -->
            <template v-else-if="step === 5">
              <div class="space-y-6 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                  <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>

                <div>
                  <h3 class="text-xl font-semibold text-green-600 mb-2">Thank you!</h3>
                  <p class="text-gray-600">You successfully booked a phone call, as per details below:</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 space-y-4 text-left">
                  <div>
                    <span class="text-sm text-gray-500">Time:</span>
                    <p class="font-medium">{{filters.day_date(phone_call.selected_date_raw)}} {{ phone_call.slot.slot_display }} ({{filters.format_time_zone(user_time_zone)}})</p>
                  </div>

                  <div>
                    <span class="text-sm text-gray-500">Student Name:</span>
                    <p class="font-medium capitalize">{{phone_call.student.full_name}}</p>
                  </div>

                  <div>
                    <span class="text-sm text-gray-500">Email:</span>
                    <p class="font-medium">{{phone_call.student.email}}</p>
                  </div>

                  <div>
                    <span class="text-sm text-gray-500">Phone Number:</span>
                    <p class="font-medium">{{phoneObject.countryCallingCode}} {{phone_call.student.phone_number}}</p>
                  </div>
                </div>
              </div>
            </template>
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
import { useFiltersStore } from "../store/filtersStore";
import { useErrorStore } from "../store/errorsStore";
import useSchedulePhoneCallMixin from '../mixins/useSchedulePhoneCallMixin.js'
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
import moment from "moment";
export default {
  components : { VueCal },
  mixins: [useSchedulePhoneCallMixin],
  props : ['schedule_a_phone_call_title','schedule_a_phone_call_text'],
  setup(){
        const countries = useCountriesStore()
        const filters = useFiltersStore()
        const error = useErrorStore()
        return {
            countries,filters,error
        }
    },
  data(){
    return {
      //error: false,
      errorMsg: '',
      loader: false,
      buttonLoader: false,
      showAddStudentLink : false,
      slide_animation: 'slide-left',
      activeTab: 'student',
      phone_class_reasons :['Introduction', 'Scheduling', 'Buying Classes', 'Concerns', 'General Questions', 'Other'],
      existingStudents : [],
      phone_call : {
        slot : {
          slot_display : ''
        },
        registration_type: 'Phone Call',
        reason : '',
        student : {
          full_name : ''
        },
        selected_date : '',
        selected_date_raw : '',
      },
      slots_not_available : '',
      step : 1,
      phone : '',
      phoneObject : '',
      user_time_zone : '',
      bindProps: {
        inputOptions: {
          required: true,
          styleClasses: '',
          placeholder: 'Phone Number'
        }
      },
      preferredCountries: ['US', 'GB', 'CA', 'CN', 'IN'],
      available_time_slots : [],
      timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
      calendar_start_date : '',
      calendar_end_date : '',
      disableDays : [],
      allowedDays : [],
      actualDays : [],
      notification : '',
      holidays_for_scheduling : JSON.parse(localStorage.getItem("holidays") || "[]"),
    }
  },
  computed : {
    filteredTimeSlots() {
        if (!Array.isArray(this.available_time_slots)) {
            return [];
        }
        // Only return slots that are objects and not booked
        return this.available_time_slots.filter(
            slot => slot && typeof slot === 'object' && slot.booked === false
        );
    },
    student(){
      return this.phone_call.student
    },
    getDates(){
      let startDate = moment('2021-11-15');
      let endDate = moment('2021-11-20');
      return this.getDatesRange(startDate, endDate)
    },
    isMobile() {
        return window.innerWidth <= 768; // or use a more sophisticated check
    }
  },
  watch: {
    step(newVal, oldVal) {
      if (newVal > oldVal) {
        this.slide_animation = 'slide-left'
      } else {
        this.slide_animation = 'slide-right'
      }
    },
  },
  created(){
    this.countries.get();
    this.notificationMessage();
  },
}
</script>
<style scoped>
/* Slide animations */
.slide-left-enter-active,
.slide-left-leave-active {
  transition: all 0.3s ease-in-out;
}

.slide-left-enter-from {
  transform: translateX(100%);
  opacity: 0;
}

.slide-left-leave-to {
  transform: translateX(-100%);
  opacity: 0;
}

.slide-right-enter-active,
.slide-right-leave-active {
  transition: all 0.3s ease-in-out;
}

.slide-right-enter-from {
  transform: translateX(-100%);
  opacity: 0;
}

.slide-right-leave-to {
  transform: translateX(100%);
  opacity: 0;
}
</style>
