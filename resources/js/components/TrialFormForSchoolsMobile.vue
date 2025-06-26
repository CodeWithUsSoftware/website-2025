<template>
    <div class="min-h-screen bg-gray-50">
        <div
            id="trial-form-mobile"
            class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden"
        >
            <!-- Mobile Header - Made more compact -->
            <div class="bg-white px-4 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <button
                        v-if="step > 1"
                        @click="back"
                        class="p-1.5 hover:bg-gray-100 rounded-lg transition-colors"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7"
                            />
                        </svg>
                    </button>
                    <div v-else class="w-8"></div>

                    <div class="flex items-center space-x-2">
                        <div
                            class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                />
                            </svg>
                        </div>
                        <h1 class="text-base font-medium text-gray-900">
                            School Trial
                        </h1>
                    </div>

                    <div class="w-8"></div>
                </div>

                <!-- Progress Steps - More compact -->
                <div class="flex items-center justify-center mt-4 space-x-1">
                    <div v-for="n in 5" :key="n" class="flex items-center">
                        <div
                            class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-medium"
                            :class="
                                step >= n
                                    ? 'bg-blue-500 text-white'
                                    : 'bg-gray-200 text-gray-500'
                            "
                        >
                            {{ n }}
                        </div>
                        <div
                            v-if="n < 5"
                            class="w-4 h-0.5 mx-1"
                            :class="step > n ? 'bg-blue-500' : 'bg-gray-200'"
                        ></div>
                    </div>
                </div>

                <!-- Step Labels - Smaller text -->
                <div class="flex justify-center mt-2">
                    <span class="text-xs text-gray-600">
                        <template v-if="step === 1">Class Options</template>
                        <template v-else-if="step === 2">Date & Time</template>
                        <template v-else-if="step === 3">School Info</template>
                        <template v-else-if="step === 4">Confirmation</template>
                        <template v-else-if="step === 5">Thank You</template>
                    </span>
                </div>
            </div>

            <!-- Step Content - Reduced padding -->
            <div class="flex-1 overflow-hidden">
                <transition :name="slide_animation" mode="out-in">
                    <div :key="step" class="p-3 h-full flex flex-col">
                        <!-- Step 1: Class Options -->
                        <section v-if="step === 1">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Schedule a Trial Class!
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Choose your trial class details
                                </p>
                            </div>

                            <div class="space-y-3 flex-1">
                                <div>
                                    <label class="form-label">
                                        Topic
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        v-model="registration.topic_id"
                                        @change="
                                            handleTopicSelection(
                                                registration.topic_id
                                            )
                                        "
                                        required
                                        class="form-select"
                                    >
                                        <option value="" disabled>
                                            Select Topic
                                        </option>
                                        <option
                                            v-for="topic in topics.topics"
                                            :key="topic.id"
                                            :value="topic.id"
                                        >
                                            {{
                                                topic.name !== "JavaScript"
                                                    ? topic.name
                                                    : "Web Design"
                                            }}
                                        </option>
                                    </select>
                                    <small
                                        class="text-red-500 text-sm"
                                        v-if="error.errors.topic_id"
                                        >{{ error.errors.topic_id }}</small
                                    >
                                </div>
                            </div>

                            <div class="mt-4">
                                <button
                                    @click="next"
                                    :disabled="!registration.topic_id"
                                    class="form-button form-button-primary"
                                >
                                    Next
                                </button>
                            </div>
                        </section>

                        <!-- Step 2: Date & Time Selection -->
                        <section v-if="step === 2">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Select Date & Time
                                </h3>
                                <p
                                    class="text-red-500 text-xs"
                                    v-if="registration.topic_id"
                                >
                                    Please Select any date starting from
                                    {{
                                        filters.date_format(
                                            new Date().addDays(5).format()
                                        )
                                    }}
                                    to
                                    {{
                                        filters.date_format(
                                            new Date().addDays(30).format()
                                        )
                                    }}
                                    only!
                                </p>
                            </div>

                            <div class="flex-1 space-y-3">
                                <!-- Calendar - More compact -->
                                <div class="bg-white rounded-lg">
                                    <vue-cal
                                        style="height: 240px"
                                        @view-change="ready"
                                        @ready="ready"
                                        :time="false"
                                        active-view="month"
                                        :disable-views="[
                                            'years',
                                            'year',
                                            'week',
                                            'day',
                                        ]"
                                        hide-view-selector
                                        xsmall
                                        :selected-date="
                                            registration.selected_date_raw
                                        "
                                        @cell-focus="dateClicked"
                                        :disable-days="actualDays"
                                    />
                                </div>

                                <!-- Time Slots -->
                                <div
                                    v-if="registration.selected_date"
                                    class="space-y-3"
                                >
                                    <div class="text-center">
                                        <h4
                                            class="text-blue-500 font-medium text-sm"
                                        >
                                            {{
                                                filters.day_date(
                                                    registration.selected_date_raw
                                                )
                                            }}
                                            ({{
                                                filters.format_time_zone(
                                                    timezone
                                                )
                                            }})
                                        </h4>
                                    </div>

                                    <div
                                        class="space-y-2 max-h-40 overflow-y-auto"
                                    >
                                        <template
                                            v-for="(
                                                slot, index
                                            ) in available_time_slots"
                                            :key="index"
                                        >
                                            <div
                                                v-if="
                                                    registration.selected_date &&
                                                    slot
                                                "
                                            >
                                                <button
                                                    @click="
                                                        selectClassHandler(slot)
                                                    "
                                                    type="button"
                                                    class="w-full px-3 py-2.5 rounded-lg font-medium transition-colors text-sm"
                                                    :class="
                                                        registration.slot
                                                            .slot ===
                                                            slot.slot &&
                                                        registration.slot
                                                            .teacher.id ===
                                                            slot.teacher.id
                                                            ? 'bg-blue-500 text-white border-2 border-blue-500'
                                                            : 'bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-100'
                                                    "
                                                >
                                                    {{ slot.slot_display }}
                                                </button>
                                            </div>
                                        </template>
                                    </div>

                                    <div
                                        v-if="loader"
                                        class="flex justify-center py-8"
                                    >
                                        <div
                                            class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"
                                        ></div>
                                    </div>
                                    <div
                                        v-else-if="!available_time_slots"
                                        class="text-center py-6"
                                    >
                                        <p
                                            class="text-red-500 text-sm"
                                            v-html="notification"
                                        ></p>
                                    </div>
                                </div>
                                <div v-else class="text-center py-4">
                                    <p class="text-gray-500 text-sm">
                                        Select a date to view available times
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4 space-y-2">
                                <button
                                    @click="next"
                                    :disabled="!registration.slot.slot"
                                    class="form-button form-button-primary"
                                >
                                    Next
                                </button>
                                <div class="text-center text-xs text-gray-600">
                                    <p>
                                        Don't see something that fits your
                                        schedule?
                                    </p>
                                    <a
                                        :href="'/contact'"
                                        class="text-blue-500 underline font-medium"
                                    >
                                        Send a custom request to the team
                                    </a>
                                </div>
                            </div>
                        </section>

                        <!-- Step 3: School Information -->
                        <section v-if="step === 3">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    <span
                                        class="inline-block bg-blue-500 text-white px-2 py-1 rounded text-xs font-medium mr-2"
                                        >School</span
                                    >
                                    Information
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Please provide your school details
                                </p>
                            </div>

                            <div class="space-y-3 flex-1">
                                <!-- Phone Number -->
                                <div>
                                    <label class="form-label">
                                        Number
                                        <span class="text-red-500">*</span>
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
                                        :defaultCountry="
                                            countries.countries.character_code
                                        "
                                        required
                                        class="w-full"
                                    />
                                    <small
                                        v-if="errors && errors.phone_number"
                                        class="text-red-500 text-sm"
                                        >{{ errors.phone_number }}</small
                                    >
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="form-label">
                                        Email
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        required
                                        type="email"
                                        :placeholder="free_session_email"
                                        v-model="registration.parent.email"
                                        class="form-input"
                                    />
                                </div>

                                <!-- Existing Schools or New School -->
                                <div
                                    v-if="existingStudents.length"
                                    class="space-y-3"
                                >
                                    <div>
                                        <h6 class="form-label">
                                            Select a School
                                            <span class="text-red-500">*</span>
                                        </h6>
                                        <p class="text-xs text-gray-500 mb-2">
                                            Select an existing school below or
                                            add new
                                        </p>
                                    </div>

                                    <div class="space-y-2">
                                        <select
                                            v-model="registration.student"
                                            @change="handleSchoolSelection"
                                            required
                                            class="form-select"
                                        >
                                            <option value="" disabled>
                                                Select a school
                                            </option>
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
                                            class="form-button form-button-add-new"
                                        >
                                            <svg
                                                class="w-5 h-5 mr-3"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            Add a New School
                                        </button>
                                    </div>
                                </div>

                                <!-- School Name (New School) -->
                                <div
                                    v-if="
                                        registration.addNewStudent ||
                                        !existingStudents.length
                                    "
                                >
                                    <label class="form-label">
                                        School Name
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        v-model="registration.student.full_name"
                                        required
                                        class="form-input"
                                        placeholder="Enter school name"
                                    />
                                </div>

                                <!-- Grade and Number of Students -->
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="form-label">
                                            Grade
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            v-model="registration.grade"
                                            type="text"
                                            required
                                            class="form-input"
                                            placeholder="e.g., 5th"
                                        />
                                    </div>

                                    <div>
                                        <label class="form-label">
                                            Students
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            v-model="registration.students"
                                            type="number"
                                            min="1"
                                            required
                                            class="form-input"
                                            placeholder="25"
                                        />
                                    </div>
                                </div>

                                <!-- Special Instructions -->
                                <div>
                                    <label class="form-label">
                                        Special Instructions
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <textarea
                                        rows="3"
                                        v-model="registration.notes"
                                        class="form-input resize-none"
                                        placeholder="Please provide any special instructions..."
                                    ></textarea>
                                </div>

                                <!-- How did you hear about us -->
                                <div v-if="!registration.student.id">
                                    <label class="form-label">
                                        How did you hear about us?
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        v-model="registration.ad_source"
                                        type="text"
                                        required
                                        class="form-input"
                                        placeholder="e.g., Google search, referral..."
                                    />
                                </div>
                            </div>

                            <div class="mt-4">
                                <button
                                    @click="submitStepTwo"
                                    :disabled="
                                        buttonLoader ||
                                        !registration.student.full_name
                                    "
                                    class="form-button form-button-primary"
                                >
                                    <span v-if="!buttonLoader">Next</span>
                                    <div
                                        v-else
                                        class="flex items-center justify-center"
                                    >
                                        <div
                                            class="animate-spin rounded-full h-4 w-4 border-b-2 border-white mr-2"
                                        ></div>
                                        Processing...
                                    </div>
                                </button>
                            </div>
                        </section>

                        <!-- Step 4: Confirmation -->
                        <section v-if="step === 4">
                            <div class="text-center mb-4">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Confirm Your Booking
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Are you sure you want to book this class?
                                </p>
                            </div>

                            <div
                                class="bg-gray-50 rounded-lg p-4 space-y-3 text-sm mb-6"
                            >
                                <div class="flex justify-between">
                                    <span class="font-medium text-gray-600"
                                        >Class:</span
                                    >
                                    <span class="text-gray-900">{{
                                        filters.day_date(
                                            registration.selected_date_raw
                                        )
                                    }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-medium text-gray-600"
                                        >Time:</span
                                    >
                                    <span class="text-gray-900"
                                        >{{
                                            registration.slot.slot_display
                                        }}
                                        ({{
                                            filters.format_time_zone(timezone)
                                        }})</span
                                    >
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-medium text-gray-600"
                                        >Location:</span
                                    >
                                    <span class="text-gray-900">{{
                                        registration.location.location_name
                                    }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-medium text-gray-600"
                                        >School Name:</span
                                    >
                                    <span class="text-gray-900 capitalize">{{
                                        registration.student.full_name
                                    }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-medium text-gray-600"
                                        >Email:</span
                                    >
                                    <span class="text-gray-900 break-all">{{
                                        registration.parent.email
                                    }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-medium text-gray-600"
                                        >Phone:</span
                                    >
                                    <span class="text-gray-900"
                                        >{{ phoneObject.countryCallingCode }}
                                        {{
                                            registration.parent.phone_number
                                        }}</span
                                    >
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="space-y-3 mb-6">
                                <label
                                    class="flex items-start space-x-2 cursor-pointer"
                                >
                                    <input
                                        required
                                        type="checkbox"
                                        class="mt-1 h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-blue-500"
                                    />
                                    <span class="text-xs text-gray-600">
                                        I agree to the
                                        <a
                                            :href="drive_link"
                                            class="text-blue-500 hover:underline"
                                            target="_blank"
                                        >
                                            terms of service, billing and
                                            privacy policy
                                        </a>
                                        of Code With Us
                                    </span>
                                </label>

                                <label
                                    class="flex items-start space-x-2 cursor-pointer"
                                >
                                    <input
                                        required
                                        type="checkbox"
                                        class="mt-1 h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-blue-500"
                                    />
                                    <span class="text-xs text-gray-600">
                                        {{ technology_requirements }}
                                    </span>
                                </label>
                            </div>

                            <div class="space-y-3">
                                <button
                                    @click="next"
                                    :disabled="buttonLoader"
                                    class="form-button form-button-primary"
                                >
                                    <span v-if="!buttonLoader"
                                        >Book A Class</span
                                    >
                                    <div
                                        v-else
                                        class="flex items-center justify-center"
                                    >
                                        <div
                                            class="animate-spin rounded-full h-4 w-4 border-b-2 border-white mr-2"
                                        ></div>
                                        Booking...
                                    </div>
                                </button>
                                <button
                                    @click="back"
                                    class="form-button-cancel"
                                >
                                    Cancel
                                </button>
                            </div>
                        </section>

                        <!-- Step 5: Success -->
                        <section v-if="step === 5">
                            <div class="text-center space-y-4">
                                <div
                                    class="w-12 h-12 mx-auto bg-green-100 rounded-full flex items-center justify-center"
                                >
                                    <svg
                                        class="w-6 h-6 text-green-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        />
                                    </svg>
                                </div>
                                <h3
                                    class="text-lg font-semibold text-green-600"
                                >
                                    Thank you!
                                </h3>
                                <p class="text-gray-600 text-sm">
                                    You successfully booked a class, as per
                                    details below:
                                </p>

                                <div
                                    class="bg-gray-50 rounded-lg p-4 space-y-3 text-sm"
                                >
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Class:</span
                                        >
                                        <span class="text-gray-900">{{
                                            filters.day_date(
                                                registration.selected_date_raw
                                            )
                                        }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Time:</span
                                        >
                                        <span class="text-gray-900"
                                            >{{
                                                registration.slot.slot_display
                                            }}
                                            ({{
                                                filters.format_time_zone(
                                                    timezone
                                                )
                                            }})</span
                                        >
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Location:</span
                                        >
                                        <span class="text-gray-900">{{
                                            registration.location.location_name
                                        }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >School Name:</span
                                        >
                                        <span
                                            class="text-gray-900 capitalize"
                                            >{{
                                                registration.student.full_name
                                            }}</span
                                        >
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Email:</span
                                        >
                                        <span class="text-gray-900 break-all">{{
                                            registration.parent.email
                                        }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Phone:</span
                                        >
                                        <span class="text-gray-900"
                                            >{{
                                                phoneObject.countryCallingCode
                                            }}
                                            {{
                                                registration.parent.phone_number
                                            }}</span
                                        >
                                    </div>
                                </div>

                                <a
                                    href="https://www.codewithus.com/school-program#freeform"
                                    class="inline-block mt-4 text-blue-500 underline font-medium text-sm"
                                >
                                    Please click here to learn how to access
                                    your trial class
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
import recaptcha from "../../../mixins/recaptcha";
import useTrialFormForSchoolMixin from "../mixins/useTrialFormForSchoolMixin";
import VueCal from "vue-cal";
import "vue-cal/dist/vuecal.css";
import moment from "moment";

export default {
    components: { VueCal },
    mixins: [recaptcha, useTrialFormForSchoolMixin],
    setup() {
        const countries = useCountriesStore();
        const locations = useLocationsStore();
        const filters = useFiltersStore();
        const topics = useTopics();
        const error = useErrorStore();
        return {
            countries,
            locations,
            topics,
            filters,
            error,
        };
    },
    props: [
        "free_session_email",
        "technology_requirements",
        "phone_number",
        "drive_link",
    ],
    data() {
        return {
            termsAndConditions: false,
            techRequirements: false,
            buttonLoader: false,
            showAddStudentLink: false,
            slide_animation: "slide-left",
            step: 1,
            existingStudents: [],
            phone: "",
            phoneObject: "",
            registration: {
                homework: this.homework,
                landing_page: this.landing_page,
                referral_code: this.referral_code,
                isPaymentSuccess: false,
                selectTaskClassLater: false,
                slot: "",
                location: "",
                location_id: "",
                topic: "",
                topic_id: "",
                addNewStudent: false,
                selected_date: "",
                selected_date_raw: "",
                partner_signup: null,
                registration_type: "Free Private Sessions For Schools",
                class_type: "private",
                ad_source: "",
                expectations: "",
                parent: "",
                student: "",
                grade: "",
                students: "",
                notes: "",
                time_zone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                private_session_plan_id: "prod_K699XNKkvZd84J",
                group_session_plan_id: "",
                private_session_amount: 30,
                group_session_amount: 0,
            },
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: "form-input",
                    placeholder: this.phone_number,
                },
            },
            preferredCountries: ["US", "GB", "CA", "CN", "IN"],
            available_time_slots: "",
            idempotent_id: "",
            calendar_start_date: "",
            calendar_end_date: "",
            disableDays: [],
            allowedDays: [],
            actualDays: [],
            notification: "",
            holidays_for_scheduling:
                JSON.parse(localStorage.getItem("holidays")) || [],
            flag_to_get_available_call_slots: false,
        };
    },
    computed: {
        group_session_is_free() {
            return (
                this.registration.group_session_amount <= 0 &&
                this.registration.class_type === "group"
            );
        },
    },
    watch: {
        step(newVal, oldVal) {
            if (newVal > oldVal) {
                this.slide_animation = "slide-left";
            } else {
                this.slide_animation = "slide-right";
            }
        },
    },
    created() {
        this.notificationMessage();
        this.resetSelectedSlot();
        this.locations.fetchSchoolLocation();
        this.topics.fetchTopics();
        this.schoolObject();
        this.countries.get();
        this.parentObject();
        this.registration.class_type = "private";
        this.registration.location_id = this.locations.school_location.id;
        this.registration.location = this.locations.school_location;
    },
    methods: {
        next() {
            if (typeof window !== "undefined") {
                window.location = "#freeform";
            }

            if (this.step === 4) {
                this.addFreeSession();
            } else {
                this.step++;
            }
        },
    },
};
</script>

<style scoped>
/* Form button styling */
.form-button {
    width: 100%;
    padding: 0.75rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 500;
    border-radius: 0.75rem;
    transition: all 0.2s ease;
    cursor: pointer;
    border: none;
    outline: none;
}

.form-button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.form-button-primary {
    background-color: #3b82f6;
    color: white;
}

.form-button-primary:hover:not(:disabled) {
    background-color: #2563eb;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.form-button-primary:active:not(:disabled) {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
}

/* Form input styling */
.form-input {
    width: 100%;
    padding: 0.75rem 0.875rem;
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
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    background-color: #ffffff;
}

.form-input::placeholder {
    color: #9ca3af;
}

.form-select {
    width: 100%;
    padding: 0.75rem 0.875rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.75rem;
    font-size: 0.875rem;
    background-color: #f9fafb;
    transition: all 0.2s ease;
    color: #374151;
    cursor: pointer;
}

.form-select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    background-color: #ffffff;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.375rem;
}

/* Form button add new styling - matching student form styling */
.form-button-add-new {
    width: 100% !important;
    padding: 1rem !important;
    font-size: 1rem !important;
    border: 2px solid #3b82f6 !important;
    border-radius: 0.75rem !important;
    background-color: #eff6ff !important;
    color: #3b82f6 !important;
    font-weight: 500 !important;
    transition: all 0.2s ease !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-decoration: none !important;
    outline: none !important;
}

.form-button-add-new:hover {
    background-color: #dbeafe !important;
    border-color: #2563eb !important;
    color: #2563eb !important;
    transform: translateY(-1px) !important;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15) !important;
}

.form-button-add-new:active {
    background-color: #bfdbfe !important;
    transform: translateY(0) !important;
    box-shadow: 0 2px 4px rgba(59, 130, 246, 0.15) !important;
}

/* Radio button styling for school selection */
.radio-option-label input[type="radio"] {
    appearance: none !important;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    background-color: #ffffff !important;
    border: 2px solid #d1d5db !important;
    border-radius: 50% !important;
    width: 1rem !important;
    height: 1rem !important;
    position: relative !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    margin: 0 !important;
    flex-shrink: 0 !important;
}

.radio-option-label input[type="radio"]:checked {
    border-color: #3b82f6 !important;
    background-color: #3b82f6 !important;
}

.radio-option-label input[type="radio"]:checked::after {
    content: "" !important;
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    width: 0.375rem !important;
    height: 0.375rem !important;
    border-radius: 50% !important;
    background-color: #ffffff !important;
    display: block !important;
}

.radio-option-label input[type="radio"]:focus {
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
}

.radio-option-label input[type="radio"]:hover {
    border-color: #3b82f6 !important;
}

/* Enhanced label styling for radio options */
.radio-option-label {
    border: 1px solid #e5e7eb !important;
    border-radius: 0.75rem !important;
    padding: 0.75rem !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    background-color: #ffffff !important;
    display: flex !important;
    align-items: center !important;
}

.radio-option-label:hover {
    background-color: #f9fafb !important;
    border-color: #d1d5db !important;
}

.radio-option-label.selected {
    border-color: #3b82f6 !important;
    background-color: #eff6ff !important;
}

/* Slide transitions */
.slide-left-enter-active,
.slide-left-leave-active {
    transition: transform 0.3s ease-in-out;
}

.slide-left-enter-from {
    transform: translateX(100%);
}

.slide-left-leave-to {
    transform: translateX(-100%);
}

.slide-right-enter-active,
.slide-right-leave-active {
    transition: transform 0.3s ease-in-out;
}

.slide-right-enter-from {
    transform: translateX(-100%);
}

.slide-right-leave-to {
    transform: translateX(100%);
}

/* Mobile calendar optimizations */
@media (max-width: 768px) {
    .vuecal__cell-content {
        font-size: 12px;
    }

    .vuecal__title {
        font-size: 14px;
    }
}

/* Phone input styling */
:deep(.vue-tel-input) {
    border-radius: 0.75rem !important;
    border: 1px solid #e5e7eb !important;
    background-color: #f9fafb !important;
    transition: all 0.2s !important;
    font-size: 0.875rem !important;
}

:deep(.vue-tel-input:focus-within) {
    border-color: #3b82f6 !important;
    background-color: #ffffff !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
}

:deep(.vti__input) {
    padding: 0.875rem 1rem !important;
    font-size: 0.875rem !important;
    border: none !important;
    background-color: transparent !important;
    color: #374151 !important;
    border-radius: 0 0.75rem 0.75rem 0 !important;
    min-height: auto !important;
}

:deep(.vti__input:focus) {
    outline: none !important;
    box-shadow: none !important;
}

:deep(.vti__input::placeholder) {
    color: #9ca3af !important;
}

:deep(.vti__dropdown) {
    border: none !important;
    background-color: transparent !important;
    border-radius: 0.75rem 0 0 0.75rem !important;
    padding: 0.875rem 0.5rem !important;
    min-height: auto !important;
}

:deep(.vti__dropdown:hover) {
    background-color: rgba(243, 244, 246, 0.5) !important;
}

:deep(.vti__dropdown-list) {
    border-radius: 0.75rem !important;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
    border: 1px solid #e5e7eb !important;
    max-height: 200px !important;
    overflow-y: auto !important;
    z-index: 1000 !important;
}

:deep(.vti__dropdown-item) {
    padding: 0.5rem 1rem !important;
    font-size: 0.875rem !important;
    display: flex !important;
    align-items: center !important;
}

:deep(.vti__dropdown-item:hover) {
    background-color: #f3f4f6 !important;
}

:deep(.vti__dropdown-item.highlighted) {
    background-color: #3b82f6 !important;
    color: white !important;
}

:deep(.vti__flag) {
    margin-right: 0.5rem !important;
    flex-shrink: 0 !important;
}

:deep(.vti__dropdown-arrow) {
    color: #6b7280 !important;
    margin-left: 0.25rem !important;
}

:deep(.vti__country-code) {
    color: #374151 !important;
    font-size: 0.875rem !important;
    margin-left: 0.25rem !important;
}

/* Mobile specific adjustments */
@media (max-width: 480px) {
    :deep(.vti__dropdown-list) {
        max-height: 150px !important;
    }

    :deep(.vti__input) {
        padding: 0.75rem 0.875rem !important;
    }

    :deep(.vti__dropdown) {
        padding: 0.75rem 0.5rem !important;
    }
}

/* Form cancel button styling - simple text button */
.form-button-cancel {
    width: 100% !important;
    padding: 0.75rem 1.25rem !important;
    font-size: 0.875rem !important;
    font-weight: 500 !important;
    color: #3b82f6 !important;
    background-color: transparent !important;
    border: none !important;
    border-radius: 0.75rem !important;
    transition: all 0.2s ease !important;
    cursor: pointer !important;
    outline: none !important;
    text-align: center !important;
    display: block !important;
}

.form-button-cancel:hover {
    background-color: #f1f5f9 !important;
    color: #2563eb !important;
}

.form-button-cancel:active {
    background-color: #e2e8f0 !important;
    color: #1d4ed8 !important;
}
</style>
