<template>

  <div class="px-3 md:px-0">
    <div id="phone-call" class="md:max-w-6xl mx-auto bg-white rounded-3xl shadow-card p-10 space-y-10 overflow-x-hidden" :class="step === 1 ? 'pb-52' : ''">

      <div v-if="step < 4" class="hidden sm:flex justify-center">
        <nav class="flex" aria-label="Breadcrumb">
          <ol role="list" class="bg-white rounded-md shadow px-6 flex space-x-4">
            <li class="flex">
              <div class="flex items-center">
                <a href="#pricing_div" @click="step = 1" class="text-gray-400 hover:text-gray-500 cursor-pointer" :class="step === 1 ? ' py-2' : ''">
                  <div v-if="step === 1">
                    <img
                      :class="step === 1 ? 'w-20 h-20' : 'bg-gray-500 hover:bg-gray-700'"
                      width="24" height="24" src="/phone_call.webp" alt="">
                    <span class="sr-only">Home</span>
                  </div>
                  <div v-else>
                    <a @click="step = 1" href="#pricing_div" class="ml-4 text-sm"
                       :class="step === 1 ? 'text-primary hover:text-primary-darker-1' : 'text-gray-500 hover:text-gray-700'"
                    >Class Options</a>
                  </div>
                </a>
              </div>
            </li>

            <li class="flex" v-if="step > 1">
              <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a @click="step = 2" href="#phone-call" class="ml-4 text-sm" :class="step === 2 ? 'text-primary hover:text-primary-darker-1' : 'text-gray-500 hover:text-gray-700'">Student Info</a>
              </div>
            </li>

            <li class="flex"  v-if="step > 2">
              <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a
                  :class="step === 3 ? 'text-primary hover:text-primary-darker-1' : 'text-gray-500 hover:text-gray-700'"
                  href="#phone-call" class="ml-4 text-sm" aria-current="page">Summary</a>
              </div>
            </li>
          </ol>
        </nav>
      </div>

      <div v-if="step < 4" class="sm:hidden bg-white rounded-md shadow px-4 py-3">
        <div class="flex flex-col items-center justify-center space-y-2">
          <!-- Current Step Title (centered) -->
          <span class="text-sm font-medium text-gray-700 text-center">
            <template v-if="step === 1">Class Options</template>
            <template v-else-if="step === 2">Student Info</template>
            <template v-else-if="step === 3">Summary</template>
          </span>

          <!-- Back Button (centered below text) -->
          <button
            v-if="step > 1"
            @click="step -= 1"
            class="px-4 py-1 text-xs text-primary border border-primary rounded-full flex items-center justify-center shadow-sm hover:bg-primary hover:text-white transition"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Back</span>
          </button>
        </div>
      </div>


      <div class="text-center" v-if="step < 4">
        <h4>{{schedule_a_phone_call_title}}</h4>
        <p v-if="step === 1">{{schedule_a_phone_call_text}}</p>
      </div>

      <transition :name="slide_animation">
        <form v-if="step === 1" @submit.prevent="next">

          <fieldset class="mt-6">
            <div>
              <label class="block text-sm text-gray-700 flex">Reason for call : <span class="text-danger font-bold text-xl">*</span> </label>
              <select @change="reloadData" required v-model="phone_call.reason" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                <option value="" disabled selected>Select Reason for Call</option>
                <option v-for="reason in phone_class_reasons" :key="reason" :value="reason">{{reason}}</option>
              </select>
            </div>
          </fieldset>
          <small v-if="error.errors.reason" class="text-red-500">{{error.errors.reason}}</small>

          <!-- <small v-if="errors && errors.reason" class="text-red-500">{{errors.reason}}</small> -->

          <div class="mt-6 grid grid-cols-1 md:grid-cols-2 md:gap-2">
            <vue-cal
              style="height:350px"
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
            <div class="space-y-1 max-h-96 overflow-y-auto p-0 md:px-10">
              <div class="text-primary text-center" v-if="phone_call.selected_date">{{filters.day_date(phone_call.selected_date_raw) }} ({{filters.format_time_zone(user_time_zone)}})</div>
              <div v-else>
                <div class="text-primary text-center">Select Date</div>
              </div>
              <div class="flex items-center justify-center" v-if="loader">
                <!-- <Loader class="mt-10 w-20 h-203 animate-spin text-success" variants="h-10 w-10" /> -->
              </div>

              <span>
              <div class="flex items-center justify-center px-10 py-10" v-if="!available_time_slots">
                <p class="text-red-500 text-center" v-html="notification"></p>
              </div>
              </span>

              <div class="grid grid-cols-1 cursor-pointer" v-for="(slot, index) in available_time_slots" :key="index">
                <div v-if="phone_call.selected_date && !slot.booked" @click="selectClassHandler(slot)">
                    <button type="button" class="p-3 md:mx-2 rounded-xl capitalize"
                            :class="phone_call.slot.slot === slot.slot? 'bg-primary text-white w-full' : 'text-info bg-info-lighter-4 w-full'"
                    >{{slot.slot}}
                  </button>
                </div>
              </div>
              <p v-if="slots_not_available" class="capitalize text-center text-red-500">{{slots_not_available}}</p>
            </div>
          </div>

          <div class="pt-10">
            <div class="flex justify-center ">
              <button type="submit" :disabled="buttonLoader || !phone_call.slot.slot_display" class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary  w-full md:w-max mx-auto px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">

                Next
                <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
              </button>
            </div>


                     <!-- <div class="flex items-center justify-center space-x-3 py-3">-->
            <!--            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">-->
            <!--              <circle cx="10" cy="10" r="10" fill="#FF9E45"/>-->
            <!--              <path d="M8.6 12.04C8.6 11.548 8.708 11.092 8.924 10.672C9.14 10.252 9.404 9.892 9.716 9.592C10.028 9.28 10.34 8.986 10.652 8.71C10.964 8.422 11.228 8.116 11.444 7.792C11.66 7.456 11.768 7.108 11.768 6.748C11.768 6.244 11.594 5.86 11.246 5.596C10.898 5.32 10.43 5.182 9.842 5.182C9.278 5.182 8.792 5.326 8.384 5.614C7.976 5.902 7.682 6.31 7.502 6.838L5.72 5.83C6.056 4.978 6.596 4.324 7.34 3.868C8.096 3.4 8.948 3.166 9.896 3.166C10.964 3.166 11.888 3.472 12.668 4.084C13.448 4.696 13.838 5.542 13.838 6.622C13.838 7.126 13.73 7.6 13.514 8.044C13.298 8.476 13.034 8.848 12.722 9.16C12.41 9.472 12.098 9.778 11.786 10.078C11.474 10.366 11.21 10.678 10.994 11.014C10.778 11.35 10.67 11.692 10.67 12.04H8.6ZM10.598 15.82C10.334 16.084 10.016 16.216 9.644 16.216C9.272 16.216 8.954 16.084 8.69 15.82C8.426 15.556 8.294 15.238 8.294 14.866C8.294 14.494 8.42 14.176 8.672 13.912C8.936 13.648 9.26 13.516 9.644 13.516C10.016 13.516 10.334 13.648 10.598 13.912C10.862 14.176 10.994 14.494 10.994 14.866C10.994 15.238 10.862 15.556 10.598 15.82Z" fill="white"/>-->
            <!--            </svg>-->
            <!--            <pages>Have any questions?</pages>-->
            <!--          </div> -->
          </div>

        </form>
      </transition>

      <transition :name="slide_animation">
        <form class="md:px-32 pb-52" v-if="step === 2" @submit.prevent="submitStepTwo">
          <div class="space-y-8">
            <div class="pt-2">
              <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6">

                <div class="">
                  <label class="block text-sm text-gray-700 flex">Phone Number <span class="text-danger font-bold text-xl">*</span> </label>
                  <div class="mt-1">
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
                    ></vue-tel-input>
                    <small v-if="errors && errors.phone_number" class="text-red-500">{{errors.phone_number}}</small>
                  </div>
                </div>

                <div class="">
                  <label class="block text-sm text-gray-700 flex">Email<span class="text-danger font-bold text-xl">*</span></label>
                  <div class="mt-1">
                    <input required type="email" placeholder="Email" v-model="phone_call.student.email" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                  </div>
                </div>


                <div class="md:col-span-2">
                  <fieldset class="mt-6" v-if="existingStudents.length">
                    <div>
                      <div class="text-black-lighter-2 flex">Choose a Student <span class="text-danger font-bold text-xl">*</span></div>
                      <p class="text-sm text-gray-500">Select an existing student below or add new</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 mt-4 space-y-2">
                      <div class="flex items-center" v-for="s in existingStudents">
                        <input type="radio" name="student" :value="s" v-model="phone_call.student" class="focus:ring-primary h-4 w-4 text-primary border-gray-300" required>
                        <label class="ml-3 block text-sm text-gray-700 capitalize">{{s.full_name}}</label>
                      </div>
                    </div>
                  </fieldset>
                  <div v-if="loader" class="flex justify-center">
                    <!-- <Loader class="mt-10 w-20 h-203 animate-spin text-success" variants="h-10 w-10" /> -->
                  </div>
                </div>

                <div class="md:col-span-2 text-info" v-if="existingStudents.length">
                  <div class="flex items-center justify-end space-x-3">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.48438 0.35504C8.95776 0.35504 9.34152 0.738796 9.34152 1.21218L9.34152 7.62814L15.7575 7.62814C16.2309 7.62814 16.6146 8.01189 16.6146 8.48528C16.6146 8.95867 16.2309 9.34242 15.7575 9.34242L9.34152 9.34242V15.7584C9.34152 16.2318 8.95776 16.6155 8.48438 16.6155C8.01099 16.6155 7.62723 16.2318 7.62723 15.7584V9.34242L1.21128 9.34242C0.737889 9.34242 0.354133 8.95867 0.354134 8.48528C0.354134 8.01189 0.73789 7.62814 1.21128 7.62814L7.62723 7.62814L7.62723 1.21218C7.62723 0.738796 8.01099 0.35504 8.48438 0.35504Z" fill="#4A77C4"/>
                    </svg>
                    <p class="text-info cursor-pointer" @click="addNewStudentHandler">Add a New Student</p>
                  </div>
                </div>

                <div class="" v-if="phone_call.addNewStudent">
                  <label class="block text-sm text-gray-700 flex">Student Name <span class="text-danger font-bold text-xl">*</span></label>
                  <div class="mt-1">
                    <input type="text" v-model="phone_call.student.full_name" required class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                  </div>
                </div>

                <div class="" v-if="phone_call.addNewStudent">
                  <label class="block text-sm text-gray-700 flex">Age <span class="text-danger font-bold text-xl">*</span></label>
                  <div class="mt-1">
                    <input type="number" v-model="phone_call.student.age" required class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="pt-5">
            <div class="flex justify-center">
              <button type="submit" :disabled="buttonLoader || !phone_call.student.full_name" class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">
                <span>Next</span>
                <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
              </button>
            </div>

                   <!-- <div class="flex items-center justify-center space-x-3 py-3 pt-3">-->
            <!--          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">-->
            <!--            <circle cx="10" cy="10" r="10" fill="#FF9E45"/>-->
            <!--            <path d="M8.6 12.04C8.6 11.548 8.708 11.092 8.924 10.672C9.14 10.252 9.404 9.892 9.716 9.592C10.028 9.28 10.34 8.986 10.652 8.71C10.964 8.422 11.228 8.116 11.444 7.792C11.66 7.456 11.768 7.108 11.768 6.748C11.768 6.244 11.594 5.86 11.246 5.596C10.898 5.32 10.43 5.182 9.842 5.182C9.278 5.182 8.792 5.326 8.384 5.614C7.976 5.902 7.682 6.31 7.502 6.838L5.72 5.83C6.056 4.978 6.596 4.324 7.34 3.868C8.096 3.4 8.948 3.166 9.896 3.166C10.964 3.166 11.888 3.472 12.668 4.084C13.448 4.696 13.838 5.542 13.838 6.622C13.838 7.126 13.73 7.6 13.514 8.044C13.298 8.476 13.034 8.848 12.722 9.16C12.41 9.472 12.098 9.778 11.786 10.078C11.474 10.366 11.21 10.678 10.994 11.014C10.778 11.35 10.67 11.692 10.67 12.04H8.6ZM10.598 15.82C10.334 16.084 10.016 16.216 9.644 16.216C9.272 16.216 8.954 16.084 8.69 15.82C8.426 15.556 8.294 15.238 8.294 14.866C8.294 14.494 8.42 14.176 8.672 13.912C8.936 13.648 9.26 13.516 9.644 13.516C10.016 13.516 10.334 13.648 10.598 13.912C10.862 14.176 10.994 14.494 10.994 14.866C10.994 15.238 10.862 15.556 10.598 15.82Z" fill="white"/>-->
            <!--          </svg>-->
            <!--          <pages>Have any questions?</pages>-->
            <!--        </div> -->
          </div>
        </form>
      </transition>

      <transition :name="slide_animation">
        <section v-if="step === 3">
                 <!-- <h5 class="relative bg-primary-lighter-2 text-center rounded-lg">-->
          <!--          Order Confirmation-->
          <!--          <div class="absolute right-5 top-5 cursor-pointer" @click="back">-->
          <!--            <svg class="w-6 h-6" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">-->
          <!--              <circle opacity="0.2" cx="17" cy="17" r="17" fill="#FF9E45"/>-->
          <!--              <path d="M11.2511 11.2511C11.5858 10.9163 12.1285 10.9163 12.4632 11.2511L17 15.7878L21.5368 11.2511C21.8715 10.9163 22.4142 10.9163 22.7489 11.2511C23.0837 11.5858 23.0837 12.1285 22.7489 12.4632L18.2122 17L22.7489 21.5368C23.0837 21.8715 23.0837 22.4142 22.7489 22.7489C22.4142 23.0837 21.8715 23.0837 21.5368 22.7489L17 18.2122L12.4632 22.7489C12.1285 23.0837 11.5858 23.0837 11.2511 22.7489C10.9163 22.4142 10.9163 21.8715 11.2511 21.5368L15.7878 17L11.2511 12.4632C10.9163 12.1285 10.9163 11.5858 11.2511 11.2511Z" fill="#FF9E45"/>-->
          <!--            </svg>-->
          <!--          </div>-->
          <!--        </h5> -->

          <div class="space-y-10">
            <h5 class="text-center">Are you sure you want to book a phone call ?</h5>
            <div class="md:pl-60 space-y-2">
              <p><span class="font-bold"><span class="text-primary">Time:</span></span> {{filters.day_date(phone_call.selected_date_raw)}} {{ phone_call.slot.slot_display }} ({{filters.format_time_zone(user_time_zone)}}) </p>
              <p><span class="font-bold"><span class="text-primary">Student Name:</span></span> <span class="capitalize">{{phone_call.student.full_name}}</span> </p>
              <p><span class="font-bold"><span class="text-primary">Email:</span></span> {{phone_call.student.email}} </p>
              <p><span class="font-bold"><span class="text-primary">Phone Number:</span></span> {{phoneObject.countryCallingCode}} {{phone_call.student.phone_number}} </p>
            </div>
            <div class="text-center space-y-3 md:space-y-0">
              <small v-if="error" class="text-red-500">{{errorMsg}}</small>
              <button @click="bookPhoneCallSlot" :disabled="loader" type="button" class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">
                <span>Book Phone Call</span>
                <!-- <Loader v-if="loader" variants="animate-spin" /> -->
              </button>
              <button @click="back" type="button" class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-primary bg-white hover:bg-primary-darker-1 focus:text-white focus:outline-none ">
                Cancel
              </button>
            </div>
          </div>

        </section>
      </transition>

      <transition :name="slide_animation">
        <section class=" py-12" v-if="step === 4">
          <h5 class="text-primary text-center"><span class="text-primary">Thank you!</span></h5>
          <p class="text-center">You successfully booked a phone call, as per details below:</p>
          <div class="md:pl-60 pt-10 space-y-2">
            <p><span class="font-bold"><span class="text-primary">Time:</span></span> {{filters.day_date(phone_call.selected_date_raw)}} {{ phone_call.slot.slot_display }} ({{filters.format_time_zone(user_time_zone)}}) </p>
            <p><span class="font-bold"><span class="text-primary">Student Name:</span></span> <span class="capitalize">{{phone_call.student.full_name}}</span> </p>
            <p><span class="font-bold"><span class="text-primary">Email:</span></span> {{phone_call.student.email}} </p>
            <p><span class="font-bold"><span class="text-primary">Phone Number:</span></span> {{phoneObject.countryCallingCode}} {{phone_call.student.phone_number}} </p>
          </div>
        </section>
      </transition>
    </div>
  </div>
  <loader></loader>
  <Notification></Notification>
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
  mixins: [useSchedulePhoneCallMixin],
  components : { VueCal },
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
      showAddStudentLink : false,
      slide_animation: '',
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
      available_time_slots : '',
      timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
      calendar_start_date : '',
      calendar_end_date : '',
      disableDays : [],
      allowedDays : [],
      actualDays : [],
      notification : '',
      holidays_for_scheduling : JSON.parse(localStorage.getItem("holidays")),
    }
  },
  computed : {
    student(){
      return this.phone_call.student
    },
    getDates(){
      let startDate = moment('2021-11-15');
      let endDate = moment('2021-11-20');
      return this.unction(startDate, endDate)
    },
    isMobile() {
        return window.innerWidth <= 768; // or use a more sophisticated check
    }
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
  created(){
    this.countries.get();
    this.notificationMessage();
  },
}
</script>
