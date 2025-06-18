<template>
  <div class="min-h-screen bg-gray-50">
    <div id="monthly-subscription-mobile" class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden">

      <!-- Mobile Header -->
      <div class="bg-white px-4 py-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
          <button v-if="step > 0" @click="back" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <div v-else class="w-10"></div>

          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
              </svg>
            </div>
            <h1 class="text-lg font-semibold text-gray-900">Monthly Subscription</h1>
          </div>

          <div class="w-10"></div>
        </div>

        <!-- Progress Steps -->
        <div class="flex items-center justify-center mt-6 space-x-2">
          <div v-for="n in 5" :key="n" class="flex items-center">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold transition-all duration-300"
                 :class="step >= n ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-sm' : step === n ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-sm' : 'bg-gray-200 text-gray-500'">
              {{ n }}
            </div>
            <div v-if="n < 5" class="w-8 h-0.5 mx-2 transition-all duration-300"
                 :class="step > n ? 'bg-gradient-to-r from-blue-500 to-purple-600' : 'bg-gray-200'"></div>
          </div>
        </div>

        <!-- Step Labels -->
        <div class="flex justify-center mt-3">
          <span class="text-sm font-medium text-gray-600">
            <template v-if="step === 0">Class Options</template>
            <template v-else-if="step === 1">Schedule</template>
            <template v-else-if="step === 2">Student Info</template>
            <template v-else-if="step === 3">Confirm</template>
            <template v-else-if="step === 4">Payment</template>
            <template v-else>Complete</template>
          </span>
        </div>
      </div>

      <!-- Step Content -->
      <div class="flex-1 overflow-hidden">
        <transition :name="slide_animation" mode="out-in">
          <div :key="step" class="p-6 h-full flex flex-col">

            <!-- Step 0: Plan Selection and Class Options -->
            <section v-if="step === 0">
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Select Your Payment Schedule</h3>
                <p class="text-gray-600 leading-relaxed">Choose the best plan for your budget</p>
              </div>

              <div class="flex-1 space-y-6">
                <!-- Plan Selector -->
                <div class="space-y-3">
                    <div v-for="plan in plans" :key="plan.value"
                        @click="switchPlan(plan.value)"
                        class="p-4 border-2 rounded-xl cursor-pointer transition-all duration-300 hover:shadow-md"
                        :class="selectedPlan === plan.value ? 'border-blue-500 bg-blue-50 shadow-sm' : 'border-gray-200 hover:border-gray-300'">
                        <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-base font-semibold text-gray-900">{{ plan.label }}</h4>
                            <p class="text-sm text-gray-600 mt-1">{{ plan.discount }} off Classes</p>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-all duration-200"
                            :class="selectedPlan === plan.value ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                            <div v-if="selectedPlan === plan.value" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Discount Banner -->
                <div class="bg-gradient-to-r from-yellow-400 to-orange-400 p-4 rounded-xl text-center shadow-sm">
                  <h6 class="font-bold text-gray-900">Limited Time: ${{ discounted_price }} off on Classes</h6>
                </div>

                <form @submit.prevent="next" class="space-y-5">
                  <!-- Location Selection -->
                  <div class="form-group">
                    <label class="form-label">
                      Location <span class="text-red-500">*</span>
                    </label>
                    <select v-model="registration.location_id" @change="handleLocationSelection(registration.location_id)" required
                            :class="['form-select', errors && errors.location_id ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : '']">
                      <option value="" disabled>Select Location</option>
                      <option v-for="location in locations.locations" :key="location.id" :value="location.id">
                        {{ location.location_name }}
                      </option>
                    </select>
                    <small v-if="errors && errors.location_id" class="error-text">{{ errors.location_id }}</small>
                  </div>

                  <!-- Topic Selection -->
                  <div class="form-group">
                    <label class="form-label">
                      Coding Topic <span class="text-red-500">*</span>
                    </label>
                    <select v-model="registration.topic_id" @change="handleTopicSelection(registration.topic_id)" required
                            :class="['form-select', errors && errors.topic_id ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : '']">
                      <option value="" disabled>Select Topic</option>
                      <option v-for="topic in topics.topics" :key="topic.id" :value="topic.id">
                        {{ topic.name }}
                      </option>
                    </select>
                    <small v-if="errors && errors.topic_id" class="error-text">{{ errors.topic_id }}</small>
                  </div>

                  <!-- Timeslot Duration -->
                  <div class="form-group">
                    <label class="form-label">
                      Timeslot Duration <span class="text-red-500">*</span>
                    </label>
                    <select v-model="registration.timeslot_duration" @change="handleTopicSelection(registration.topic_id)" required
                            class="form-select">
                      <option value="" disabled>Select Timeslot Duration</option>
                      <option value="morning">Morning - (8 am -12 pm)</option>
                      <option value="afternoon">Afternoon - (12 pm - 4 pm)</option>
                      <option value="evening">Evening (4 pm - 9 pm)</option>
                    </select>
                  </div>

                  <!-- Class Size -->
                  <div class="form-group">
                    <label class="form-label mb-4">Class Size</label>
                    <div class="space-y-3">
                      <label class="radio-option">
                        <input type="radio" value="Small Group" v-model="registration.class_type" @change="handleClassTypeChange" required
                               :class="errors && errors.class_type ? 'border-red-500' : ''"
                               class="radio-input">
                        <span class="radio-label">Small Group (3:1)</span>
                      </label>
                      <label class="radio-option">
                        <input type="radio" value="Private" v-model="registration.class_type" @change="handleClassTypeChange" required
                               :class="errors && errors.class_type ? 'border-red-500' : ''"
                               class="radio-input">
                        <span class="radio-label">Private (1:1)</span>
                      </label>
                    </div>
                    <small v-if="errors && errors.class_type" class="error-text">{{ errors.class_type }}</small>
                  </div>

                  <!-- Class Frequency -->
                  <div class="form-group">
                    <label class="form-label mb-4">Class Frequency</label>
                    <div class="space-y-3">
                      <label class="radio-option">
                        <input type="radio" :value="1" v-model="registration.class_per_week" @click="handleClassPerWeekChange" required
                               :class="errors && errors.class_per_week ? 'border-red-500' : ''"
                               class="radio-input">
                        <span class="radio-label">One per week</span>
                      </label>
                      <label class="radio-option">
                        <input type="radio" :value="2" v-model="registration.class_per_week" @click="handleClassPerWeekChange" required
                               :class="errors && errors.class_per_week ? 'border-red-500' : ''"
                               class="radio-input">
                        <span class="radio-label">Two per week</span>
                      </label>
                    </div>
                    <small v-if="errors && errors.class_per_week" class="error-text">{{ errors.class_per_week }}</small>
                  </div>
                </form>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="next"
                  class="primary-button"
                >
                  Continue
                </button>
              </div>
            </section>

            <!-- Step 1: Class Schedule -->
            <section v-if="step === 1">
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Select Your Preferred Class Schedule</h3>
                <p v-if="!allSlotsSelected" class="text-red-500 text-sm font-medium">
                  Please select {{ registration.class_per_week === 1 ? 'one class' : 'two classes' }} for the next step!
                </p>
              </div>

              <div class="flex-1 space-y-6">
                <!-- Timeslot Duration (repeated for mobile flow) -->
                <div class="form-group">
                  <label class="form-label">
                    Timeslot Duration <span class="text-red-500">*</span>
                  </label>
                  <select v-model="registration.timeslot_duration" @change="handleTopicSelection(registration.topic_id)" required
                          class="form-select">
                    <option value="" disabled>Select Timeslot Duration</option>
                    <option value="morning">Morning - (8 am -12 pm)</option>
                    <option value="afternoon">Afternoon - (12 pm - 4 pm)</option>
                    <option value="evening">Evening (4 pm - 9 pm)</option>
                  </select>
                </div>

                <!-- Calendar -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                  <vue-cal
                    @view-change="ready"
                    @ready="ready"
                    style="height:300px"
                    :time="false"
                    active-view='month'
                    :disable-views="['years', 'year', 'week', 'day']"
                    hide-view-selector
                    xsmall
                    :selected-date="registration.selected_date_raw"
                    @cell-focus="dateClicked"
                    :disable-days="actualDays">
                  </vue-cal>
                </div>

                <!-- Available Time Slots -->
                <div v-if="registration.selected_date" class="space-y-4">
                  <div class="text-center">
                    <h4 class="text-blue-600 font-semibold text-lg">
                      {{ filters.day_date(registration.selected_date_raw) }} ({{ filters.format_time_zone(timezone) }})
                    </h4>
                  </div>

                  <div v-if="loader" class="flex justify-center py-8">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                  </div>

                  <div v-else-if="!available_time_slots && !loader" class="flex items-center justify-center py-8">
                    <p class="text-red-500 text-sm font-medium" v-html="notification"></p>
                  </div>

                  <div v-else-if="available_time_slots && available_time_slots.length > 0" class="space-y-3 max-h-48 overflow-y-auto">
                    <div class="grid grid-cols-3 gap-3 text-center text-blue-600 font-semibold text-sm mb-3">
                      <span>Time</span>
                      <span class="col-span-2">Teacher</span>
                    </div>
                    <div v-for="(slot, index) in available_time_slots" :key="index"
                         @click="selectClassHandler(slot)"
                         class="grid grid-cols-3 gap-3 cursor-pointer">
                      <div class="time-slot-button">
                        {{ slot.slot_display }}
                      </div>
                      <div class="col-span-2 time-slot-button">
                        {{ slot.teacher.full_name }}
                      </div>
                    </div>
                  </div>
                </div>

                <div v-else class="flex items-center justify-center py-8">
                  <p class="text-gray-500 text-center" v-html="notification"></p>
                </div>

                <!-- Selected Classes -->
                <div v-if="registration.selectedTaskClasses.length > 0" class="space-y-3">
                  <h4 class="font-semibold text-gray-700">Selected Classes:</h4>
                  <div v-for="(slot, index) in registration.selectedTaskClasses" :key="index"
                       class="selected-class-item">
                    <span class="text-sm font-medium">{{ filters.date_format(slot.date) }}, {{ slot.slot_display }}</span>
                    <button @click="deleteSlot(slot)" type="button" class="text-white hover:text-red-200 transition-colors">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="submitStepOne"
                  :disabled="buttonLoader || !allSlotsSelected"
                  class="primary-button"
                  :class="{ 'opacity-50 cursor-not-allowed': buttonLoader || !allSlotsSelected }"
                >
                  Next
                </button>

                <div class="text-center mt-4">
                  <p class="text-sm text-gray-600">Don't see something that fits your schedule?</p>
                  <a href="/contact" class="text-blue-600 text-sm underline hover:text-blue-700 font-medium">Send a custom request to the team</a>
                </div>
              </div>
            </section>

            <!-- Step 2: Student & Parent Info -->
            <section v-if="step === 2">
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Student & Parent Information</h3>
                <p class="text-gray-600 leading-relaxed">Tell us about your child and contact details</p>
              </div>

              <div class="flex-1 space-y-6">
                <!-- Phone Number -->
                <div class="form-group">
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
                    required
                    class="w-full phone-input">
                  </vue-tel-input>
                  <small v-if="errors && errors.phone_number" class="error-text">{{ errors.phone_number }}</small>
                </div>

                <!-- Email -->
                <div class="form-group">
                  <label class="form-label">
                    Email <span class="text-red-500">*</span>
                  </label>
                  <input v-model="registration.parent.email" type="email" required
                         placeholder="Enter your email address"
                         class="form-input">
                </div>

                <!-- Existing Students Selection -->
                <div v-if="existingStudents.length">
                  <div class="mb-4">
                    <label class="form-label">
                      Choose a Student <span class="text-red-500">*</span>
                    </label>
                    <p class="text-sm text-gray-500 mt-1">Select an existing student below or add new</p>
                  </div>

                  <div class="space-y-3">
                    <label v-for="student in existingStudents" :key="student.id" class="radio-option">
                      <input type="radio" name="student" :value="student" v-model="registration.student" required
                             class="radio-input">
                      <span class="radio-label capitalize">{{ student.full_name }}</span>
                    </label>
                  </div>

                  <button
                    type="button"
                    @click="addNewStudentHandler"
                    class="secondary-button mt-4"
                  >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add a New Student
                  </button>
                </div>

                <!-- New Student Info -->
                <div v-if="registration.addNewStudent || !existingStudents.length" class="space-y-5">
                  <div class="form-group">
                    <label class="form-label">
                      Student Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" v-model="registration.student.full_name" required
                           placeholder="Enter student's full name"
                           class="form-input">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Age <span class="text-red-500">*</span>
                    </label>
                    <input type="number" v-model="registration.student.age" required
                           placeholder="Enter student's age"
                           class="form-input">
                  </div>
                </div>

                <!-- How did you hear about us -->
                <div v-if="!registration.student.id" class="form-group">
                  <label class="form-label">
                    How did you hear about us? <span class="text-red-500">*</span>
                  </label>
                  <input v-model="registration.ad_source" type="text" required
                         placeholder="How did you hear about us?"
                         class="form-input">
                </div>
              </div>

              <div class="mt-auto pt-6">
                <button
                  @click="submitStepTwo"
                  :disabled="buttonLoader"
                  class="primary-button"
                  :class="{ 'opacity-50 cursor-not-allowed': buttonLoader }"
                >
                  Next
                </button>
              </div>
            </section>

            <!-- Step 3: Order Confirmation -->
            <section v-if="step === 3">
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Order Confirmation</h3>
                <p class="text-gray-600 leading-relaxed">{{ registration.class_per_week === 1 ? 'Are you sure you want to book this class?' : 'Are you sure you want to book these classes?' }}</p>
              </div>

              <div class="flex-1 space-y-6">
                <!-- Order Summary -->
                <div class="order-summary">
                  <h5 class="font-bold text-gray-900 mb-4">Classes Selected ({{ filters.format_time_zone(timezone) }}):</h5>
                  <div v-for="(slot, index) in registration.selectedTaskClasses" :key="index" class="border-b border-gray-200 pb-4 mb-4 last:border-b-0 last:mb-0 last:pb-0">
                    <div class="space-y-2">
                      <p><span class="text-sm text-gray-500">Class {{ index + 1 }}:</span></p>
                      <p><span class="text-sm text-gray-500">Teacher:</span> <span class="capitalize font-semibold">{{ slot.teacher.full_name }}</span></p>
                      <p><span class="text-sm text-gray-500">Date:</span> <span class="font-semibold">{{ filters.day_date(slot.date) }}</span></p>
                      <p><span class="text-sm text-gray-500">Time:</span> <span class="font-semibold">{{ slot.slot_display }}</span></p>
                      <p><span class="text-sm text-gray-500">Status:</span> <span class="font-semibold">Recurring weekly</span></p>
                    </div>
                  </div>

                  <div class="border-t border-gray-200 pt-4 space-y-2">
                    <div class="flex justify-between">
                      <span class="text-sm text-gray-500">Amount:</span>
                      <span class="font-semibold">${{ total_amount }}</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-sm text-gray-500">Location:</span>
                      <span class="font-semibold">{{ registration.location.location_name }}</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-sm text-gray-500">Student Name:</span>
                      <span class="font-semibold capitalize">{{ registration.student.full_name }}</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-sm text-gray-500">Email:</span>
                      <span class="font-semibold">{{ registration.parent.email }}</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-sm text-gray-500">Phone:</span>
                      <span class="font-semibold">{{ phoneObject.countryCallingCode }} {{ registration.parent.phone_number }}</span>
                    </div>
                  </div>
                </div>

                <!-- Terms Checkbox -->
                <div class="flex items-start space-x-3">
                  <input type="checkbox" v-model="tc" required
                         class="mt-1 h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                  <label class="text-sm text-gray-600 leading-relaxed">
                    I agree to the
                    <a :href="drive_link" class="text-blue-600 underline hover:text-blue-700 font-medium" target="_blank">terms of service, billing and privacy policy</a>
                    of Code With Us
                  </label>
                </div>
              </div>

              <div class="mt-auto pt-6 space-y-3">
                <button @click="redirectToCheckout" :disabled="!tc" type="button"
                        class="primary-button"
                        :class="{ 'opacity-50 cursor-not-allowed': !tc }">
                  Book Class
                </button>
                <button @click="back" type="button"
                        class="secondary-button">
                  Cancel
                </button>
              </div>
            </section>

            <!-- Step 4: Payment -->
            <section v-show="step === 4">
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Payment</h3>
                <p class="text-gray-600 leading-relaxed">Complete your subscription</p>
              </div>

              <div id="checkout" class="payment-container">

              </div>

              <div class="mt-auto pt-6 text-center">
                <p class="text-sm text-gray-500">Secure payment powered by Stripe</p>
              </div>
            </section>

            <!-- Step 5: Success -->
            <section v-if="step === 5">
              <div class="space-y-6 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                  <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </div>

                <div>
                  <h3 class="text-xl font-bold text-green-600 mb-2">Thank you!</h3>
                  <p class="text-gray-600 mb-6 leading-relaxed">You successfully booked a class!</p>
                </div>

                <div class="order-summary text-left">
                  <p class="font-bold text-gray-900 mb-4">Classes Selected ({{ filters.format_time_zone(timezone) }}):</p>
                  <div v-for="(slot, index) in registration.selectedTaskClasses" :key="index" class="border-b border-gray-200 pb-4 mb-4 last:border-b-0 last:mb-0 last:pb-0">
                    <div class="space-y-2">
                      <p><span class="text-sm text-gray-500">Teacher:</span> <span class="capitalize font-semibold">{{ slot.teacher.full_name }}</span></p>
                      <p><span class="text-sm text-gray-500">Class:</span> <span class="font-semibold">{{ filters.day_date(slot.date) }}</span></p>
                      <p><span class="text-sm text-gray-500">Time:</span> <span class="font-semibold">{{ slot.slot_display }}, ({{ filters.format_time_zone(timezone) }})</span></p>
                      <p><span class="text-sm text-gray-500">Status:</span> <span class="font-semibold">Recurring weekly</span></p>
                    </div>
                  </div>
                  <div class="border-t border-gray-200 pt-4 space-y-2">
                    <p><span class="text-sm text-gray-500">Location:</span> <span class="font-semibold">{{ registration.location.location_name }}</span></p>
                    <p><span class="text-sm text-gray-500">Student Name:</span> <span class="font-semibold capitalize">{{ registration.student.full_name }}</span></p>
                    <p><span class="text-sm text-gray-500">Email:</span> <span class="font-semibold">{{ registration.parent.email }}</span></p>
                    <p><span class="text-sm text-gray-500">Phone Number:</span> <span class="font-semibold">{{ phoneObject.countryCallingCode }} {{ registration.parent.phone_number }}</span></p>
                  </div>
                  <div class="pt-4 text-center">
                    <a href="/how-to-videos" target="_blank" class="text-blue-600 font-bold underline hover:text-blue-700">
                      Please click here to learn how to access your weekly class
                    </a>
                  </div>
                </div>
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
// ...existing code... (same script section as before)
import { useCountriesStore } from '../store/countries';
import { useLocationsStore } from '../store/locations';
import { useFiltersStore } from '../store/filtersStore';
import { useTopics } from '../store/topics';
import { useErrorStore } from '../store/errorsStore';
import { useNotificationStore } from '../store/notificationStore';
import { useStudentsStore } from '../store/studentsStore';
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
import recaptcha from "../../../mixins/recaptcha";
import partner_code_cookie from "../../../mixins/partner_code_cookie"
import moment from 'moment';

let stripe = Stripe("pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69");

export default {
    props: ['private_classes_discount_price', 'group_classes_discount_price', 'drive_link'],
    mixins: [partner_code_cookie, recaptcha],
    components: { VueCal },
    setup() {
        const countries = useCountriesStore()
        const locations = useLocationsStore()
        const filters = useFiltersStore()
        const topics = useTopics()
        const errors = useErrorStore()
        const notify = useNotificationStore()
        const studentStore = useStudentsStore()

        return { countries, locations, topics, filters, errors, notify, studentStore }
    },
    data() {
        return {
            error: '',
            tc: false,
            checkout: null,
            buttonLoader: false,
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
            existingStudents: [],
            slide_animation: '',
            step: 0,
            date: '',
            phone: '',
            planId: '',
            registration: {
                phone: '',
                totalAmount: 0,
                last_date_to_put_in_class: moment().add(16, 'days'),
                payment_type: 'monthly',
                isPaymentSuccess: false,
                type: 'subscriptions',
                registration_type: 'Monthly Recurring Subscriptions',
                location_id: '',
                timeslot_duration: '',
                location: '',
                topic: '',
                topic_id: '',
                class_type: 'Small Group',
                class_per_week: 1,
                billing_cycle: 1,
                selected_date: '',
                selected_date_raw: '',
                addNewStudent: false,
                selectedTaskClasses: [],
                student: '',
                parent: '',
                time_zone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                ad_source: '',
                expectations: '',
                paymentResponse: [],
                plan_id: '',
                stripe_id: null,
                payment_id: '',
                brand: 'codewithus',
                isEligible: 'ineligible',
                selectClassLater: false,
                selectClassLaterMessage: '',
                selected_plan: 'beginner',
                class_per_month: 4,
                referral: '',
                address: '',
                starts_at: '',
                slot: {
                    existing: false,
                    slot: '',
                    slot_display: '',
                    space: '',
                    space_count: 0,
                    taskclass: { id: 0 },
                    teacher: { id: 0 }
                }
            },
            discount_two_class_per_week: 10,
            available_time_slots: '',
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: '',
                    placeholder: 'Phone Number...'
                }
            },
            preferredCountries: ['US', 'GB', 'CA', 'CN', 'IN'],
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            final_amount: '',
            source: '',
            config: '',
            notification: '',
            calendar_start_date: '',
            calendar_end_date: '',
            disableDays: [],
            allowedDays: [],
            actualDays: [],
            country: {},
            phoneObject: '',
            holidays_for_scheduling: JSON.parse(localStorage.getItem("holidays")) || [],
            discounted_price: '',
            selectedPlan: "monthly",
            plans: [
                { value: "monthly", label: "Monthly", discount: "20%" },
                { value: "quarterly", label: "Quarterly", discount: "30%" },
                { value: "semi", label: "Semi Annually", discount: "35%" },
            ],
        }
    },
    computed: {
        // ...existing computed properties...
        allSlotsSelected() {
            return this.registration.selectedTaskClasses.length === parseInt(this.registration.class_per_week)
        },
        studentId() {
            return this.registration.student.id;
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
            return parseFloat(this.price_per_class * this.registration.class_per_month * this.registration.class_per_week * this.registration.billing_cycle)
        },
        discount_extra() {
            let discount = 0;
            if (this.registration.class_per_week > 1) {
                discount = parseFloat((this.discount_two_class_per_week / 100) * this.sub_amount)
            }
            return discount;
        },
        classPerWeekText: function() {
            if (this.registration.class_per_week > 1)
                return 'Twice a Week';
            else
                return 'Once a Week';
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
    created() {
        // ...existing created method...
        this.notificationMessage();
        this.countries.get();
        this.locations.fetchLocations();
        this.topics.fetchTopics();
        this.studentObject();
        this.parentObject();
        this.source = axios.CancelToken.source()
        this.config = { cancelToken: this.source.token }
        this.final_amount = this.total_amount;

        const interval = parseInt(localStorage.getItem('weekly_interval'), 10);
        const validIntervals = [1, 3, 6];
        if (interval && validIntervals.includes(interval)) {
            this.registration.billing_cycle = interval;
            const planMap = { 1: 'monthly', 3: 'quarterly', 6: 'semi' };
            const planValue = planMap[interval];
            this.$nextTick(() => {
                this.switchPlan(planValue);
            });
            localStorage.removeItem('weekly_interval');
        }
    },
    methods: {
        // ...existing methods... (same as before)
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
        handleClassTypeChange() {
            this.getAvailableTimeSlots();
        },
        handleClassPerWeekChange() {
            this.getAvailableTimeSlots();
        },
        handleBillingCycleChange() {
            this.getAvailableTimeSlots();

            const planMap = { 1: 'monthly', 3: 'quarterly', 6: 'semi' };
            const planValue = planMap[this.registration.billing_cycle];
            if (planValue && planValue !== this.selectedPlan) {
                this.selectedPlan = planValue;
            }
        },
        nextAvailableDate() {
            let date = new Date().addDays(3)
            this.registration.selected_date = this.filters.toDateString(date);
            this.registration.selected_date_raw = date
            this.available_time_slots = '';
            this.getAvailableTimeSlots()
        },
        deleteSlot(slot) {
            this.registration.selectedTaskClasses.splice(this.registration.selectedTaskClasses.indexOf(slot), 1);
        },
        submitStepOne() {
            if (!this.allSlotsSelected) {
                this.notify.setMessage('Please select number of classes as per the class frequency')
            } else {
                this.next();
            }
        },
        submitStepTwo() {
            let _this = this;
            _this.registration.parent.phone = _this.phoneObject;
            _this.registration.parent.phone_number = _this.phoneObject.nationalNumber;
            if (_this.registration.parent.full_name === '') {
                _this.registration.parent.full_name = _this.registration.student.full_name;
            }
            axios.post('/web/setSubscriptionFormStepTwo', _this.registration).then(response => {
                this.next();
            });
        },
        handleTopicSelection(topic_id) {
            this.topics.topics.forEach(topic => {
                if (topic_id === topic.id) { this.registration.topic = topic }
            })
            this.reloadData();
        },
        handleLocationSelection(location_id) {
            this.locations.locations.forEach(location => {
                if (location_id === location.id) { this.registration.location = location }
            })
            this.reloadData();
        },
        isDuplicate(slot) {
            let isDuplicate = false;
            this.registration.selectedTaskClasses.forEach(selectedTaskClass => {
                if (slot.slot === selectedTaskClass.slot) {
                    isDuplicate = true;
                } else {
                    isDuplicate = false;
                }
            })
            return isDuplicate
        },
        selectClassHandler(slot) {
            if (this.registration.selectedTaskClasses.length >= parseInt(this.registration.class_per_week)) {
                this.notify.setMessage('You have selected the maximum number of classes!')
            } else if (this.isDuplicate(slot)) {
                this.notify.setMessage('You have already selected this slot please select a different one!')
            } else {
                this.registration.selectedTaskClasses.push(slot)
            }
        },
        dateClicked(e) {
            this.available_time_slots = '';
            let current_selected_date = this.registration.selected_date_raw ? this.registration.selected_date_raw : new Date().format();
            this.registration.selected_date_raw = e;
            let enteredDate = new Date(e).format();
            let startDateMinusOne = new Date().addDays(2).format()
            let startDate = new Date().addDays(3).format()
            let endDate = new Date().addDays(365).format()
            let endDatePlusOne = new Date().addDays(366).format()
            if (!moment(enteredDate).isBetween(startDateMinusOne, endDatePlusOne)) {
                this.notification = `Select date between ${this.filters.date_format(startDate)} and ${this.filters.date_format(endDate)} only!`
                return false;
            }
            if (!this.loader) {
                this.registration.selected_date = this.filters.toDateString(e);
                this.registration.selected_date_raw = e
                this.available_time_slots = '';
                this.getAvailableTimeSlots()
            } else {
                this.notification = 'Please wait until the selected date classes have been loaded!';
                setTimeout(() => {
                    this.registration.selected_date_raw = current_selected_date;
                }, 300)
            }
        },
        getAvailableTimeSlots() {
            let _this = this;
            _this.available_time_slots = '';
            if (_this.registration.location_id && _this.registration.topic_id && _this.registration.timeslot_duration) {
                axios.post('/forms/getNewSubscriptionAvailableTimeSlots', _this.registration, this.config).then(response => {
                    _this.available_time_slots = response.data.available_time_slots;
                    _this.flag_to_get_available_call_slots = true;
                })
            }
        },
        next() {
            if (typeof window !== 'undefined') {
                window.scrollTo(0, 0);
            }
            this.step++;
        },
        back() {
            if (typeof window !== 'undefined') {
                window.scrollTo(0, 0);
            }
            this.step--;
        },
        studentObject() {
            this.registration.student = {
                id: '',
                full_name: '',
                age: '',
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
                this.registration.student = { id: '', full_name: '', age: '', email: '' };
            } else {
                this.registration.addNewStudent = true;
            }
            this.existingStudents = [];
            this.studentObject();
        },
        fetchExistingStudents() {
            this.existingStudents = [];
            this.studentObject()
            this.registration.addNewStudent = false;
            if (this.registration.phone.nationalNumber) {
                this.studentStore.getExistingStudentsNew(this.registration).then((response) => {
                    this.studentStore.students = response.data.students;
                    this.studentStore.parent = response.data.parent;
                    this.existingStudents = response.data.students;
                    this.studentStore.addStudent = (response.data.parent !== null) ? false : true;
                    this.studentStore.existingStudent = (response.data.parent !== null) ? false : true;
                    this.studentStore.students_count = response.data.students_count;
                    this.registration.parent = this.studentStore.parent || { id: '', full_name: '', age: '', email: '', stripe_id: '' };
                    this.registration.parent.phone_number = this.registration.parent.phone_number;
                    this.registration.amount = this.net_price;

                    if (this.existingStudents.length == 0) {
                        this.addNewStudentHandler();
                    }
                }).catch(error => {
                    this.addNewStudentHandler();
                })
            }
        },
        async redirectToCheckout() {
            try {
                let fetchSession = '';
                console.log(this.step, 'step before');
                this.next();
                console.log(this.step, 'step after');
                this.registration.totalAmount = this.net_price;
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
                this.checkout.mount('#checkout');
            } catch (error) {
                this.stripe_error = error;
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

            if (this.registration.billing_cycle !== newCycle) {
                this.registration.billing_cycle = newCycle;
                this.handleBillingCycleChange();
            }
        },
    },
}
</script>

<style scoped>
/* Form Elements */
.form-group {
  @apply mb-6;
}

.form-label {
  @apply block text-sm font-semibold text-gray-700 mb-2;
}

.form-input {
  @apply w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-base text-gray-900 bg-white;
  @apply focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100;
  @apply transition-all duration-200 placeholder-gray-500;
}

.form-input:focus {
  @apply shadow-sm;
}

.form-select {
  @apply w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-base text-gray-900 bg-white;
  @apply focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100;
  @apply transition-all duration-200 cursor-pointer;
}

.form-select:focus {
  @apply shadow-sm;
}

/* Radio Options */
.radio-option {
  @apply flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer;
  @apply hover:border-gray-300 hover:bg-gray-50 transition-all duration-200;
}

.radio-option:has(input:checked) {
  @apply border-blue-500 bg-blue-50 shadow-sm;
}

.radio-input {
  @apply h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-500 focus:ring-2;
}

.radio-label {
  @apply ml-3 text-gray-700 font-medium;
}

/* Buttons */
.primary-button {
  @apply w-full py-4 px-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white;
  @apply rounded-xl font-semibold text-lg shadow-lg;
  @apply hover:from-blue-600 hover:to-purple-700 hover:shadow-xl;
  @apply focus:outline-none focus:ring-4 focus:ring-blue-200;
  @apply transition-all duration-300 transform hover:-translate-y-0.5;
}

.secondary-button {
  @apply w-full py-4 px-6 bg-white text-blue-600 border-2 border-blue-500;
  @apply rounded-xl font-semibold text-lg;
  @apply hover:bg-blue-50 hover:shadow-md;
  @apply focus:outline-none focus:ring-4 focus:ring-blue-200;
  @apply transition-all duration-300 flex items-center justify-center;
}

/* Time Slot Buttons */
.time-slot-button {
  @apply bg-blue-100 text-blue-800 p-3 rounded-xl text-center text-sm font-semibold;
  @apply hover:bg-blue-200 hover:shadow-sm transition-all duration-200 cursor-pointer;
  @apply transform hover:-translate-y-0.5;
}

/* Selected Class Items */
.selected-class-item {
  @apply flex items-center justify-between bg-gradient-to-r from-blue-500 to-purple-600;
  @apply text-white p-4 rounded-xl shadow-sm;
}

/* Order Summary */
.order-summary {
  @apply bg-gray-50 rounded-xl p-6 border border-gray-200 shadow-sm;
}

/* Error Text */
.error-text {
  @apply text-red-500 text-sm font-medium mt-1 block;
}

/* Phone Input Styling */
.phone-input {
  @apply rounded-xl border-2 border-gray-200;
}

.phone-input:focus-within {
  @apply border-blue-500 ring-4 ring-blue-100;
}

/* Payment Container */
.payment-container {
  @apply bg-white rounded-xl border border-gray-200 p-4;
}

/* Slide Animations */
.slide-left-enter-active,
.slide-left-leave-active,
.slide-right-enter-active,
.slide-right-leave-active {
  @apply transition-all duration-300;
}

.slide-left-enter-from {
  @apply transform translate-x-full opacity-0;
}

.slide-left-leave-to {
  @apply transform -translate-x-full opacity-0;
}

.slide-right-enter-from {
  @apply transform -translate-x-full opacity-0;
}

.slide-right-leave-to {
  @apply transform translate-x-full opacity-0;
}

/* Mobile Responsiveness */
@media (max-width: 480px) {
  .form-input,
  .form-select {
    @apply py-3 text-base;
  }

  .primary-button,
  .secondary-button {
    @apply py-3 text-base;
  }

  .radio-option {
    @apply p-3;
  }

  .order-summary {
    @apply p-4;
  }
}

/* Custom Vue-cal styling */
:deep(.vuecal) {
  @apply rounded-xl border border-gray-200;
}

:deep(.vuecal__cell) {
  @apply hover:bg-blue-50 transition-colors duration-200;
}

:deep(.vuecal__cell.selected) {
  @apply bg-blue-100;
}

/* Vue-tel-input styling */
:deep(.vue-tel-input) {
  @apply border-2 border-gray-200 rounded-xl;
}

:deep(.vue-tel-input:focus-within) {
  @apply border-blue-500 ring-4 ring-blue-100;
}

:deep(.vue-tel-input input) {
  @apply px-4 py-3 text-base;
}
</style>
