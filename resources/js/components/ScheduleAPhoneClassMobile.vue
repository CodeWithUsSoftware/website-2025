<template>
    <div class="min-h-screen bg-gray-50">
        <div
            id="phone-call-mobile"
            class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden"
        >
            <!-- Mobile Header -->
            <div class="bg-white px-4 py-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <button v-if="step > 1" @click="back" class="p-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-gray-600"
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
                    <div v-else class="w-10"></div>

                    <div class="flex items-center space-x-2">
                        <div
                            class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>
                        </div>
                        <h1 class="text-lg font-medium text-gray-900">
                            Schedule a Phone Call
                        </h1>
                    </div>

                    <div class="w-10"></div>
                </div>

                <!-- Progress Steps -->
                <div class="flex items-center justify-center mt-6 space-x-2">
                    <div v-for="n in 4" :key="n" class="flex items-center">
                        <div
                            class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium"
                            :class="
                                step >= n
                                    ? 'bg-blue-500 text-white'
                                    : step === n
                                    ? 'bg-blue-500 text-white'
                                    : 'bg-gray-200 text-gray-500'
                            "
                        >
                            {{ n }}
                        </div>
                        <div
                            v-if="n < 4"
                            class="w-8 h-0.5 mx-2"
                            :class="step > n ? 'bg-blue-500' : 'bg-gray-200'"
                        ></div>
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
                            <div class="text-center mb-4">
                                <p class="text-sm text-gray-600">
                                    Enter your phone number to select a phone
                                    call time.
                                </p>
                            </div>

                            <div class="space-y-4 flex-1">
                                <div>
                                    <label class="form-label">
                                        Reason for call
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        v-model="phone_call.reason"
                                        @change="reloadData"
                                        required
                                        class="form-select"
                                    >
                                        <option value="" disabled>
                                            Select Reason for Call
                                        </option>
                                        <option
                                            v-for="reason in phone_class_reasons"
                                            :key="reason"
                                            :value="reason"
                                        >
                                            {{ reason }}
                                        </option>
                                    </select>
                                    <small
                                        v-if="error.errors.reason"
                                        class="text-red-500 mt-1 block"
                                        >{{ error.errors.reason }}</small
                                    >
                                </div>
                            </div>

                            <div class="mt-auto pt-6">
                                <button
                                    @click="next"
                                    :disabled="!phone_call.reason"
                                    class="form-button form-button-primary"
                                >
                                    Next
                                </button>
                            </div>
                        </template>

                        <!-- Step 2: Date & Time Selection -->
                        <template v-else-if="step === 2">
                            <div class="text-center mb-4">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Select Date
                                </h3>
                                <p
                                    class="text-red-500 text-xs"
                                    v-if="phone_call.reason"
                                >
                                    Please Select any date starting from
                                    Wednesday Jun 11th, 2025 to Tuesday Jun
                                    24th, 2025 only!
                                </p>
                            </div>

                            <div class="flex-1 space-y-4">
                                <!-- Calendar -->
                                <div class="bg-white rounded-lg">
                                    <vue-cal
                                        style="height: 300px"
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
                                            phone_call.selected_date_raw
                                        "
                                        @cell-focus="dateClicked"
                                        :disable-days="actualDays"
                                    >
                                    </vue-cal>
                                </div>

                                <!-- Time Slots -->
                                <div
                                    v-if="phone_call.selected_date"
                                    class="space-y-4"
                                >
                                    <div class="text-center">
                                        <h4
                                            class="text-blue-500 font-medium text-sm"
                                        >
                                            {{
                                                filters.day_date(
                                                    phone_call.selected_date_raw
                                                )
                                            }}
                                            ({{
                                                filters.format_time_zone(
                                                    user_time_zone
                                                )
                                            }})
                                        </h4>
                                    </div>

                                    <div
                                        class="space-y-2 max-h-48 overflow-y-auto"
                                    >
                                        <template
                                            v-for="(
                                                slot, index
                                            ) in available_time_slots"
                                            :key="index"
                                        >
                                            <div
                                                v-if="
                                                    phone_call.selected_date &&
                                                    slot &&
                                                    !slot.booked
                                                "
                                            >
                                                <button
                                                    @click="
                                                        selectClassHandler(slot)
                                                    "
                                                    type="button"
                                                    class="w-full p-3 rounded-lg font-medium transition-colors text-sm"
                                                    :class="
                                                        phone_call.slot.slot ===
                                                        slot.slot
                                                            ? 'bg-blue-500 text-white border-2 border-blue-500'
                                                            : 'bg-blue-50 text-blue-600 border-2 border-transparent hover:border-blue-200'
                                                    "
                                                >
                                                    {{ slot.slot }}
                                                </button>
                                            </div>
                                        </template>

                                        <p
                                            v-if="slots_not_available"
                                            class="text-center text-red-500 py-3 text-sm"
                                        >
                                            {{ slots_not_available }}
                                        </p>
                                    </div>
                                </div>

                                <div
                                    v-else
                                    class="flex items-center justify-center py-6"
                                >
                                    <p
                                        class="text-gray-500 text-center text-sm"
                                        v-html="notification"
                                    ></p>
                                </div>
                            </div>

                            <div class="mt-auto pt-6">
                                <button
                                    @click="next"
                                    :disabled="!phone_call.slot.slot_display"
                                    class="form-button form-button-primary"
                                >
                                    Next
                                </button>
                            </div>
                        </template>

                        <!-- Step 3: Student Details -->
                        <template v-else-if="step === 3">
                            <div class="flex-1 space-y-4">
                                <div class="space-y-4">
                                    <!-- Phone Number -->
                                    <div>
                                        <label class="form-label">
                                            Phone Number
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <vue-tel-input
                                            v-bind="bindProps"
                                            :preferredCountries="
                                                preferredCountries
                                            "
                                            :autoFormat="false"
                                            @input="phoneInput"
                                            @blur="onPhoneNumberEnter"
                                            @country-changed="
                                                onPhoneNumberEnter
                                            "
                                            v-model="phone"
                                            :autoDefaultCountry="true"
                                            :defaultCountry="
                                                countries.countries
                                                    .character_code
                                            "
                                            required
                                            class="w-full"
                                        />
                                        <small
                                            v-if="errors && errors.phone_number"
                                            class="text-red-500 mt-1 block"
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
                                            type="email"
                                            placeholder="Email"
                                            v-model="phone_call.student.email"
                                            required
                                            class="form-input"
                                        />
                                    </div>

                                    <!-- Student Selection -->
                                    <div v-if="existingStudents.length">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Choose a Student
                                                <span class="text-red-500"
                                                    >*</span
                                                >
                                            </label>
                                            <p class="text-xs text-gray-500">
                                                Select an existing student below
                                                or add new
                                            </p>
                                        </div>

                                        <div class="space-y-3">
                                            <select
                                                v-model="phone_call.student"
                                                required
                                                class="form-select"
                                            >
                                                <option
                                                    v-if="phone_call.student"
                                                    :value="{ id: '' }"
                                                    disabled
                                                    selected
                                                >
                                                    Select an existing student
                                                    or add new
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
                                                class="add-new-student-button"
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
                                                Add a New Student
                                            </button>
                                        </div>
                                    </div>

                                    <!-- New Student Form -->
                                    <div
                                        v-if="
                                            phone_call.addNewStudent ||
                                            !existingStudents.length
                                        "
                                        class="space-y-4"
                                    >
                                        <div>
                                            <label class="form-label">
                                                Student Name
                                                <span class="text-red-500"
                                                    >*</span
                                                >
                                            </label>
                                            <input
                                                type="text"
                                                v-model="
                                                    phone_call.student.full_name
                                                "
                                                required
                                                placeholder="Enter student's name"
                                                class="form-input"
                                            />
                                        </div>

                                        <div>
                                            <label class="form-label">
                                                Age
                                                <span class="text-red-500"
                                                    >*</span
                                                >
                                            </label>
                                            <input
                                                type="number"
                                                v-model="phone_call.student.age"
                                                required
                                                placeholder="Enter student's age"
                                                class="form-input"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto pt-6">
                                <button
                                    @click="submitStepTwo"
                                    :disabled="
                                        buttonLoader ||
                                        !phone_call.student.full_name
                                    "
                                    class="form-button form-button-primary"
                                >
                                    <span>Next</span>
                                </button>
                            </div>
                        </template>

                        <!-- Step 4: Confirmation -->
                        <template v-else-if="step === 4">
                            <div class="text-center mb-4">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Are you sure you want to book a phone call?
                                </h3>
                            </div>

                            <div class="flex-1 space-y-4">
                                <div
                                    class="bg-gray-50 rounded-lg p-3 space-y-1.5 text-sm"
                                >
                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Time:</span
                                        >
                                        <p class="font-medium">
                                            {{
                                                filters.day_date(
                                                    phone_call.selected_date_raw
                                                )
                                            }}
                                            {{ phone_call.slot.slot_display }}
                                            ({{
                                                filters.format_time_zone(
                                                    user_time_zone
                                                )
                                            }})
                                        </p>
                                    </div>

                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Student Name:</span
                                        >
                                        <p class="font-medium capitalize">
                                            {{ phone_call.student.full_name }}
                                        </p>
                                    </div>

                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Email:</span
                                        >
                                        <p class="font-medium">
                                            {{ phone_call.student.email }}
                                        </p>
                                    </div>

                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Phone Number:</span
                                        >
                                        <p class="font-medium">
                                            {{ phoneObject.countryCallingCode }}
                                            {{
                                                phone_call.student.phone_number
                                            }}
                                        </p>
                                    </div>
                                </div>

                                <small
                                    v-if="error"
                                    class="text-red-500 block text-center text-xs"
                                    >{{ errorMsg }}</small
                                >
                            </div>

                            <div class="mt-auto pt-6 space-y-3">
                                <button
                                    @click="bookPhoneCallSlot"
                                    :disabled="loader"
                                    class="form-button form-button-primary"
                                >
                                    Book Phone Call
                                </button>

                                <button
                                    @click="back"
                                    type="button"
                                    class="form-button form-button-secondary"
                                >
                                    Cancel
                                </button>
                            </div>
                        </template>

                        <!-- Step 5: Success -->
                        <template v-else-if="step === 5">
                            <div class="space-y-4 text-center">
                                <div
                                    class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto"
                                >
                                    <svg
                                        class="w-8 h-8 text-green-500"
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

                                <div>
                                    <h3
                                        class="text-lg font-semibold text-green-600 mb-1"
                                    >
                                        Thank you!
                                    </h3>
                                    <p class="text-gray-600 text-sm">
                                        You successfully booked a phone call, as
                                        per details below:
                                    </p>
                                </div>

                                <div
                                    class="bg-gray-50 rounded-lg p-3 space-y-1.5 text-left text-xs"
                                >
                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Time:</span
                                        >
                                        <p class="font-medium">
                                            {{
                                                filters.day_date(
                                                    phone_call.selected_date_raw
                                                )
                                            }}
                                            {{ phone_call.slot.slot_display }}
                                            ({{
                                                filters.format_time_zone(
                                                    user_time_zone
                                                )
                                            }})
                                        </p>
                                    </div>

                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Student Name:</span
                                        >
                                        <p class="font-medium capitalize">
                                            {{ phone_call.student.full_name }}
                                        </p>
                                    </div>

                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Email:</span
                                        >
                                        <p class="font-medium">
                                            {{ phone_call.student.email }}
                                        </p>
                                    </div>

                                    <div>
                                        <span class="text-xs text-gray-500"
                                            >Phone Number:</span
                                        >
                                        <p class="font-medium">
                                            {{ phoneObject.countryCallingCode }}
                                            {{
                                                phone_call.student.phone_number
                                            }}
                                        </p>
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
import useSchedulePhoneCallMixin from "../mixins/useSchedulePhoneCallMixin.js";
import VueCal from "vue-cal";
import "vue-cal/dist/vuecal.css";
import moment from "moment";
export default {
    components: { VueCal },
    mixins: [useSchedulePhoneCallMixin],
    props: ["schedule_a_phone_call_title", "schedule_a_phone_call_text"],
    setup() {
        const countries = useCountriesStore();
        const filters = useFiltersStore();
        const error = useErrorStore();
        return {
            countries,
            filters,
            error,
        };
    },
    data() {
        return {
            //error: false,
            errorMsg: "",
            loader: false,
            buttonLoader: false,
            showAddStudentLink: false,
            slide_animation: "slide-left",
            activeTab: "student",
            phone_class_reasons: [
                "Introduction",
                "Scheduling",
                "Buying Classes",
                "Concerns",
                "General Questions",
                "Other",
            ],
            existingStudents: [],
            phone_call: {
                slot: {
                    slot_display: "",
                },
                registration_type: "Phone Call",
                reason: "",
                student: {
                    full_name: "",
                },
                selected_date: "",
                selected_date_raw: "",
            },
            slots_not_available: "",
            step: 1,
            phone: "",
            phoneObject: "",
            user_time_zone: "",
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: "",
                    placeholder: "Phone Number",
                },
            },
            preferredCountries: ["US", "GB", "CA", "CN", "IN"],
            available_time_slots: [],
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            calendar_start_date: "",
            calendar_end_date: "",
            disableDays: [],
            allowedDays: [],
            actualDays: [],
            notification: "",
            holidays_for_scheduling: JSON.parse(
                localStorage.getItem("holidays") || "[]"
            ),
        };
    },
    computed: {
        filteredTimeSlots() {
            if (!Array.isArray(this.available_time_slots)) {
                return [];
            }
            // Only return slots that are objects and not booked
            return this.available_time_slots.filter(
                (slot) =>
                    slot && typeof slot === "object" && slot.booked === false
            );
        },
        student() {
            return this.phone_call.student;
        },
        getDates() {
            let startDate = moment("2021-11-15");
            let endDate = moment("2021-11-20");
            return this.getDatesRange(startDate, endDate);
        },
        isMobile() {
            return window.innerWidth <= 768; // or use a more sophisticated check
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
        this.countries.get();
        this.notificationMessage();
    },
};
</script>
<style scoped>
/* Button styling to match design exactly */
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
    /* Solid blue instead of light blue */
    color: #ffffff;
    /* White text instead of dark blue */
}

.form-button-primary:hover:not(:disabled) {
    background-color: #2563eb;
    /* Darker blue on hover */
}

.form-button-primary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background-color: #9ca3af;
    /* Gray when disabled */
}

.form-button-secondary {
    background-color: transparent;
    color: #3b82f6;
    border: 1px solid #3b82f6;
}

.form-button-secondary:hover {
    background-color: #eff6ff;
}

/* Form input styling */
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

/* Phone input styling */
:deep(.vue-tel-input) {
    border-radius: 0.75rem !important;
}

:deep(.vti__input) {
    padding: 0.875rem 1rem !important;
    font-size: 0.875rem !important;
    border-radius: 0 0.75rem 0.75rem 0 !important;
    border: 1px solid #e5e7eb !important;
    background-color: #f9fafb !important;
    transition: all 0.2s !important;
    color: #374151 !important;
}

:deep(.vti__input:focus) {
    border-color: #3b82f6 !important;
    background-color: #ffffff !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    outline: none !important;
}

:deep(.vti__input::placeholder) {
    color: #9ca3af !important;
}

:deep(.vti__dropdown) {
    border-radius: 0.75rem 0 0 0.75rem !important;
    border: 1px solid #e5e7eb !important;
    background-color: #f9fafb !important;
}

:deep(.vti__dropdown:hover) {
    background-color: #f3f4f6 !important;
}

:deep(.vti__dropdown-list) {
    border-radius: 0.75rem !important;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
}

/* Add new student button styling */
.add-new-student-button {
    width: 100%;
    padding: 1rem;
    font-size: 1rem;
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
    margin-top: 1rem;
}

.add-new-student-button:hover {
    background-color: #dbeafe;
    border-color: #2563eb;
}

.add-new-student-button:active {
    background-color: #bfdbfe;
}

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
