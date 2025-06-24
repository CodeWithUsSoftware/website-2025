<template>
    <div class="min-h-screen bg-gray-50">
        <div
            id="reschedule-form-mobile"
            class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden"
            v-if="showForm"
        >
            <!-- Mobile Header -->
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
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </div>
                        <h1 class="text-base font-medium text-gray-900">
                            Reschedule Class
                        </h1>
                    </div>

                    <div class="w-8"></div>
                </div>

                <!-- Progress Steps -->
                <div class="flex items-center justify-center mt-4 space-x-1">
                    <div
                        v-for="n in totalSteps"
                        :key="n"
                        class="flex items-center"
                    >
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
                            v-if="n < totalSteps"
                            class="w-4 h-0.5 mx-1"
                            :class="step > n ? 'bg-blue-500' : 'bg-gray-200'"
                        ></div>
                    </div>
                </div>

                <!-- Step Labels -->
                <div class="flex justify-center mt-2">
                    <span class="text-xs text-gray-600">
                        <template v-if="step === 1">Student Info</template>
                        <template v-else-if="step === 2">Verification</template>
                        <template v-else-if="step === 3">Select Class</template>
                        <template v-else-if="step === 4 && !reschedule.cancel"
                            >New Schedule</template
                        >
                        <template v-else-if="step === 5">Confirmation</template>
                        <template v-else-if="step === 6">Complete</template>
                    </span>
                </div>
            </div>

            <!-- Step Content -->
            <div class="flex-1 overflow-hidden">
                <transition :name="slide_animation" mode="out-in">
                    <div :key="step" class="p-3 h-full flex flex-col">
                        <!-- Step 1: Student Info -->
                        <section v-if="step === 1">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    {{ schedule_a_makeup_class_heading }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ schedule_a_makeup_class_text }}
                                </p>
                            </div>

                            <div class="space-y-3 flex-1">
                                <!-- Phone Number -->
                                <div>
                                    <label class="form-label">
                                        Phone Number
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <vue-tel-input
                                        v-bind="bindProps"
                                        :preferredCountries="preferredCountries"
                                        :autoFormat="false"
                                        @input="phoneInput"
                                        @focus="resetStudentInfoStep"
                                        v-model="phone"
                                        :autoDefaultCountry="true"
                                        :defaultCountry="
                                            countries.countries?.character_code
                                        "
                                        required
                                        class="w-full"
                                    />
                                    <small
                                        v-if="errors && errors.phone_number"
                                        class="text-red-500 text-sm"
                                        >{{ errors.phone_number }}</small
                                    >
                                    <div
                                        v-if="errorMessage"
                                        class="text-red-500 text-sm text-center pt-2"
                                    >
                                        {{ errorMessage }}
                                    </div>
                                </div>

                                <!-- Loading indicator -->
                                <div
                                    v-if="loader"
                                    class="flex justify-center py-4"
                                >
                                    <div
                                        class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"
                                    ></div>
                                </div>

                                <!-- Student Selection -->
                                <div
                                    v-if="existingStudents.length"
                                    class="space-y-3"
                                >
                                    <div>
                                        <label class="form-label">
                                            Choose a Student
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <select
                                            v-model="reschedule.student"
                                            class="form-select"
                                        >
                                            <option disabled value="">
                                                Choose a student
                                            </option>
                                            <option
                                                v-for="student in existingStudents"
                                                :key="student.id"
                                                :value="student"
                                            >
                                                {{ student.full_name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Verification Method -->
                                <div
                                    v-if="existingStudents.length"
                                    class="space-y-3"
                                >
                                    <div>
                                        <h4 class="form-label">
                                            Select verification method
                                            <span class="text-red-500">*</span>
                                        </h4>
                                    </div>

                                    <div class="space-y-2">
                                        <div
                                            class="flex items-center p-3 border rounded-lg cursor-pointer transition-colors"
                                            :class="
                                                reschedule.type === 'code'
                                                    ? 'border-blue-500 bg-blue-50'
                                                    : 'border-gray-200 hover:border-gray-300'
                                            "
                                            @click="reschedule.type = 'code'"
                                        >
                                            <input
                                                type="radio"
                                                value="code"
                                                v-model="reschedule.type"
                                                class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-500"
                                                required
                                            />
                                            <label
                                                class="ml-3 block text-sm text-gray-700 cursor-pointer"
                                            >
                                                Get Verification Code
                                            </label>
                                        </div>
                                        <div
                                            class="flex items-center p-3 border rounded-lg cursor-pointer transition-colors"
                                            :class="
                                                reschedule.type === 'password'
                                                    ? 'border-blue-500 bg-blue-50'
                                                    : 'border-gray-200 hover:border-gray-300'
                                            "
                                            @click="
                                                reschedule.type = 'password'
                                            "
                                        >
                                            <input
                                                type="radio"
                                                value="password"
                                                v-model="reschedule.type"
                                                class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-500"
                                                required
                                            />
                                            <label
                                                class="ml-3 block text-sm text-gray-700 cursor-pointer"
                                            >
                                                Enter Student Password
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button
                                    v-if="!existingStudents.length"
                                    @click="onPhoneNumberEnter"
                                    :disabled="!phoneObject?.valid"
                                    class="form-button form-button-primary"
                                >
                                    Fetch Students
                                </button>
                                <button
                                    v-else
                                    @click="submitStepOne"
                                    :disabled="
                                        buttonLoader ||
                                        !reschedule.student?.id ||
                                        !reschedule.type
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
                                        Loading...
                                    </div>
                                </button>
                            </div>
                        </section>

                        <!-- Step 2: Verification -->
                        <section v-if="step === 2">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Student Verification
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{
                                        reschedule.type === "password"
                                            ? "Enter your password"
                                            : "Enter the verification code"
                                    }}
                                </p>
                            </div>

                            <form
                                @submit.prevent="studentVerification"
                                class="space-y-3 flex-1"
                            >
                                <div v-if="reschedule.type === 'password'">
                                    <label class="form-label">
                                        Password
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        v-model="reschedule.pass_code"
                                        type="password"
                                        required
                                        autocomplete="off"
                                        class="form-input"
                                        placeholder="Enter your password"
                                    />
                                    <div class="mt-2 space-y-1">
                                        <div
                                            v-if="errorMessage"
                                            class="text-red-500 text-sm"
                                        >
                                            {{ errorMessage }}
                                        </div>
                                        <div
                                            class="text-blue-500 cursor-pointer text-sm underline"
                                            @click="resetPassword"
                                        >
                                            Forgot password? Click to reset!
                                        </div>
                                    </div>
                                </div>

                                <div v-if="reschedule.type === 'code'">
                                    <label class="form-label">
                                        Verification Code
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        v-model="reschedule.pass_code"
                                        type="number"
                                        required
                                        class="form-input"
                                        placeholder="Enter verification code"
                                    />
                                    <div class="mt-2">
                                        <div
                                            @click="
                                                reschedule.type = 'password'
                                            "
                                            class="text-blue-500 cursor-pointer text-sm underline"
                                        >
                                            Did not receive SMS? Click to enter
                                            student password!
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button
                                        type="submit"
                                        :disabled="buttonLoader"
                                        class="form-button form-button-primary"
                                    >
                                        <span v-if="!buttonLoader">Verify</span>
                                        <div
                                            v-else
                                            class="flex items-center justify-center"
                                        >
                                            <div
                                                class="animate-spin rounded-full h-4 w-4 border-b-2 border-white mr-2"
                                            ></div>
                                            Verifying...
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </section>

                        <!-- Step 3: Select Class -->
                        <section v-if="step === 3">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Select Class to Reschedule
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Choose the class you want to reschedule
                                </p>
                            </div>

                            <div
                                v-if="reschedule.selectedClassToReschedule"
                                class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg"
                            >
                                <p class="text-sm text-green-700">
                                    <strong>Selected:</strong>
                                    {{
                                        reschedule.selectedClassToReschedule
                                            .name
                                    }},
                                    {{
                                        reschedule.selectedClassToReschedule
                                            .starts_at
                                    }}
                                    <span
                                        v-if="
                                            reschedule.selectedClassToReschedule
                                                .teacher.length
                                        "
                                    >
                                        , Teacher:
                                        {{
                                            reschedule.selectedClassToReschedule
                                                .teacher[0].full_name
                                        }}
                                    </span>
                                </p>
                            </div>

                            <div class="space-y-3 flex-1">
                                <div
                                    v-if="tasks_classes.length"
                                    class="space-y-2"
                                >
                                    <div
                                        v-for="task_class in tasks_classes"
                                        :key="task_class.id"
                                        class="border rounded-lg p-3 cursor-pointer transition-colors"
                                        :class="
                                            reschedule.selectedClassToReschedule
                                                .id === task_class.id
                                                ? 'border-blue-500 bg-blue-50'
                                                : 'border-gray-200 hover:border-gray-300'
                                        "
                                        @click="rescheduleNow(task_class)"
                                    >
                                        <div class="space-y-1">
                                            <div
                                                class="font-medium text-gray-900 capitalize"
                                            >
                                                <span class="text-blue-500"
                                                    >Class:</span
                                                >
                                                {{ task_class.name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                <span class="text-blue-500"
                                                    >Starts At:</span
                                                >
                                                {{ task_class.starts_at }} ({{
                                                    filters.format_time_zone(
                                                        timezone
                                                    )
                                                }})
                                            </div>
                                            <div
                                                v-if="task_class.teacher.length"
                                                class="text-sm text-gray-500 capitalize"
                                            >
                                                <span class="text-blue-500"
                                                    >Teacher:</span
                                                >
                                                {{
                                                    task_class.teacher[0]
                                                        .full_name
                                                }}
                                            </div>
                                        </div>

                                        <div
                                            class="mt-3 flex space-x-2"
                                            v-if="
                                                !task_class.parent_id &&
                                                task_class.is_absent_rescheduled_after_class_starts ===
                                                    0
                                            "
                                        >
                                            <button
                                                v-if="
                                                    task_class.students[0].pivot
                                                        .rescheduled !== 2
                                                "
                                                @click.stop="
                                                    cancelClass(task_class)
                                                "
                                                class="flex-1 py-2 px-3 text-xs font-medium border border-red-500 rounded-full text-white bg-red-500 hover:bg-red-600 transition-colors"
                                            >
                                                Cancel
                                            </button>
                                            <button
                                                @click.stop="
                                                    testNew(task_class)
                                                "
                                                class="flex-1 py-2 px-3 text-xs font-medium border border-blue-500 rounded-full text-white bg-blue-500 hover:bg-blue-600 transition-colors"
                                            >
                                                Reschedule
                                            </button>
                                        </div>
                                        <div
                                            v-else-if="
                                                !task_class.parent_id &&
                                                task_class.is_absent_rescheduled_after_class_starts ===
                                                    1
                                            "
                                            class="mt-2 text-xs text-orange-600"
                                        >
                                            Reach out to the admins if you have
                                            any questions.
                                        </div>
                                        <div
                                            v-else
                                            class="mt-2 text-xs text-red-600"
                                        >
                                            This is a Make Up Class, cannot be
                                            rescheduled!
                                        </div>
                                    </div>
                                </div>
                                <div v-else class="text-center py-8">
                                    <p class="text-red-500 text-sm">
                                        No classes available for make-up
                                    </p>
                                </div>
                            </div>
                        </section>

                        <!-- Step 4: New Schedule -->
                        <section v-if="step === 4">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    Choose New Schedule
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Select a new date and time for your class
                                </p>
                            </div>

                            <div class="space-y-3 flex-1">
                                <!-- Teacher Selection -->
                                <div>
                                    <label class="form-label">
                                        Teachers
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        v-model="reschedule.showAllTeacher"
                                        @change="handleChangeInTeacher()"
                                        class="form-select"
                                    >
                                        <option selected disabled value="">
                                            Select Teacher
                                        </option>
                                        <option selected :value="true">
                                            All Teachers
                                        </option>
                                        <option selected :value="false">
                                            Current Teacher
                                        </option>
                                    </select>
                                </div>

                                <!-- Calendar -->
                                <div class="bg-white rounded-lg">
                                    <vue-cal
                                        style="height: 240px"
                                        @view-change="ready"
                                        @ready="ready"
                                        :time="false"
                                        ref="vueCal"
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
                                            reschedule.selected_date_raw
                                        "
                                        @cell-focus="dateClicked"
                                        :disable-days="actualDays"
                                    />
                                </div>

                                <!-- Time Slots -->
                                <div
                                    v-if="reschedule.selected_date"
                                    class="space-y-3"
                                >
                                    <div class="text-center">
                                        <h4
                                            class="text-blue-500 font-medium text-sm"
                                        >
                                            {{
                                                filters.day_date(
                                                    reschedule.selected_date_raw
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
                                        class="space-y-2 max-h-48 overflow-y-auto"
                                    >
                                        <div
                                            v-if="loader"
                                            class="flex justify-center py-8"
                                        >
                                            <div
                                                class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"
                                            ></div>
                                        </div>
                                        <div
                                            v-else-if="
                                                reschedule.showAllTeacher ===
                                                    '' ||
                                                reschedule.showAllTeacher ===
                                                    null
                                            "
                                            class="text-center py-6"
                                        >
                                            <p class="text-gray-500 text-sm">
                                                Please select a teacher
                                                preference first
                                            </p>
                                        </div>
                                        <div
                                            v-else-if="
                                                !available_time_slots ||
                                                Object.keys(
                                                    available_time_slots
                                                ).length === 0
                                            "
                                            class="text-center py-6"
                                        >
                                            <p class="text-red-500 text-sm">
                                                No available time slots for this
                                                date
                                            </p>
                                        </div>
                                        <div v-else>
                                            <div class="space-y-2">
                                                <template
                                                    v-for="(
                                                        slot, index
                                                    ) in available_time_slots"
                                                    :key="index"
                                                >
                                                    <div
                                                        v-if="
                                                            reschedule.selected_date &&
                                                            slot
                                                        "
                                                    >
                                                        <button
                                                            @click="
                                                                selectClassHandler(
                                                                    slot
                                                                )
                                                            "
                                                            type="button"
                                                            class="w-full px-3 py-2.5 rounded-lg font-medium transition-colors text-sm"
                                                            :class="
                                                                reschedule.slot
                                                                    .id ===
                                                                    slot.id &&
                                                                reschedule.slot
                                                                    .teacher_id ===
                                                                    slot.teacher_id &&
                                                                reschedule.slot
                                                                    .time_int ===
                                                                    slot.time_int
                                                                    ? 'bg-blue-500 text-white border-2 border-blue-500'
                                                                    : 'bg-blue-50 text-blue-600 border-2 border-transparent hover:border-blue-200'
                                                            "
                                                        >
                                                            {{
                                                                filters.timeOnly(
                                                                    slot.starts_at_local_time
                                                                )
                                                            }}
                                                            <div
                                                                class="text-xs"
                                                            >
                                                                {{
                                                                    slot.teacher_name
                                                                }}
                                                            </div>
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
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
                                    :disabled="
                                        Object.keys(reschedule.slot).length < 2
                                    "
                                    class="form-button form-button-primary"
                                >
                                    Next
                                </button>
                                <div class="text-center text-xs text-gray-600">
                                    <p>
                                        Don't see something that fits your
                                        schedule?
                                    </p>
                                    <p class="text-blue-500 underline">
                                        Email request to info@codewithus.com
                                    </p>
                                </div>
                            </div>
                        </section>

                        <!-- Step 5: Confirmation -->
                        <section v-if="step === 5">
                            <div class="text-center mb-3">
                                <h3
                                    class="text-base font-medium text-gray-900 mb-1"
                                >
                                    {{
                                        !reschedule.cancel
                                            ? "Confirm Reschedule"
                                            : "Confirm Cancellation"
                                    }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{
                                        !reschedule.cancel
                                            ? "Are you sure you want to reschedule?"
                                            : "Are you sure you want to cancel this class?"
                                    }}
                                </p>
                            </div>

                            <div class="space-y-3 flex-1">
                                <div
                                    v-if="!reschedule.cancel"
                                    class="bg-gray-50 rounded-lg p-4 space-y-2 text-sm"
                                >
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Time:</span
                                        >
                                        <span class="text-gray-900"
                                            >{{
                                                reschedule.slot
                                                    .starts_at_local_time
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
                                            >Teacher:</span
                                        >
                                        <span
                                            class="text-gray-900 capitalize"
                                            >{{
                                                reschedule.slot.teacher_name
                                            }}</span
                                        >
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Student:</span
                                        >
                                        <span
                                            class="text-gray-900 capitalize"
                                            >{{
                                                reschedule.student?.full_name
                                            }}</span
                                        >
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Email:</span
                                        >
                                        <span class="text-gray-900 break-all">{{
                                            reschedule.student?.email
                                        }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Phone:</span
                                        >
                                        <span class="text-gray-900">{{
                                            reschedule.student?.phone_number
                                        }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-medium text-gray-600"
                                            >Location:</span
                                        >
                                        <span class="text-gray-900">{{
                                            reschedule.selectedClassToReschedule
                                                .location.location_name
                                        }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 space-y-3">
                                <button
                                    @click="rescheduleClass"
                                    :disabled="buttonLoader"
                                    class="form-button form-button-primary"
                                >
                                    <span v-if="!buttonLoader">
                                        {{
                                            !reschedule.cancel
                                                ? "Yes, Reschedule!"
                                                : "Yes, Cancel & Reschedule Later!"
                                        }}
                                    </span>
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
                                <button
                                    @click="back"
                                    class="form-button-cancel"
                                >
                                    Cancel
                                </button>
                            </div>
                        </section>

                        <!-- Step 6: Success -->
                        <section v-if="step === 6">
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
                                    {{
                                        !reschedule.cancel
                                            ? "You successfully rescheduled your class!"
                                            : "You successfully cancelled your class."
                                    }}
                                </p>

                                <div
                                    v-if="!reschedule.cancel"
                                    class="bg-gray-50 rounded-lg p-3 mt-4 text-left space-y-1.5 text-xs"
                                >
                                    <p>
                                        <span class="font-medium">Time:</span>
                                        {{
                                            reschedule.slot.starts_at_local_time
                                        }}
                                        ({{
                                            filters.format_time_zone(timezone)
                                        }})
                                    </p>
                                    <p>
                                        <span class="font-medium"
                                            >Teacher:</span
                                        >
                                        {{ reschedule.slot.teacher_name }}
                                    </p>
                                    <p>
                                        <span class="font-medium"
                                            >Student:</span
                                        >
                                        {{ reschedule.student?.full_name }}
                                    </p>
                                    <p>
                                        <span class="font-medium">Email:</span>
                                        {{ reschedule.student?.email }}
                                    </p>
                                    <p>
                                        <span class="font-medium">Phone:</span>
                                        {{ reschedule.student?.phone_number }}
                                    </p>
                                    <p>
                                        <span class="font-medium"
                                            >Location:</span
                                        >
                                        {{
                                            reschedule.selectedClassToReschedule
                                                .location.location_name
                                        }}
                                    </p>
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
import { useCountriesStore } from "../store/countries";
import { useFiltersStore } from "../store/filtersStore";
import { useErrorStore } from "../store/errorsStore";
import useRescheduleMixin from "../mixins/useRescheduleMixin";
import VueCal from "vue-cal";
import "vue-cal/dist/vuecal.css";
import moment from "moment";
import axios from "axios";

export default {
    components: { VueCal },
    mixins: [useRescheduleMixin],
    props: ["schedule_a_makeup_class_heading", "schedule_a_makeup_class_text"],
    setup() {
        const countries = useCountriesStore();
        const filters = useFiltersStore();
        const errors = useErrorStore();
        return {
            countries,
            filters,
            errors,
        };
    },
    data() {
        return {
            reschedule: {
                cancel: false,
                slot: { id: 0 },
                selectedClassToReschedule: "",
                registration_type: "Reschedule",
                selected_date_raw: "",
                pass_code: "",
                type: "",
                student: {
                    id: 0,
                },
                location: [],
                selected_date: "",
                showAllTeacher: "",
            },
            phone: "",
            phoneObject: "",
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: "form-input",
                    placeholder: "Enter phone number",
                },
            },
            preferredCountries: ["US", "GB", "CA", "CN", "IN"],
            availableTaskClasses: [],
            tasks_classes: [],
            loader: false,
            buttonLoader: false,
            linkLoader: false,
            notification: false,
            step: 1,
            step_up: true,
            slide_animation: "slide-left",
            existingStudents: [],
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            calendar_start_date: "",
            calendar_end_date: "",
            disableDays: [],
            allowedDays: [],
            actualDays: [],
            available_time_slots: [],
            errorMessage: "",
            holidays_for_scheduling: JSON.parse(
                localStorage.getItem("holidays")
            ),
            showForm: false,
        };
    },
    computed: {
        totalSteps() {
            return this.reschedule.cancel ? 5 : 6;
        },
        student() {
            return this.reschedule.student;
        },
        location() {
            return this.reschedule.location;
        },
        student_id() {
            return this.reschedule.student.id;
        },
    },
    watch: {
        step(newVal, oldVal) {
            if (newVal > oldVal) {
                this.slide_animation = "slide-left";
                this.step_up = true;
            } else {
                this.slide_animation = "slide-right";
                this.step_up = false;
            }
        },
    },
    created() {
        this.countries.get();
        setTimeout(() => {
            this.showForm = true;
        }, 3500);
    },
    methods: {
        //
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

/* Form cancel button styling */
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

.form-select option[disabled] {
    color: #9ca3af;
    font-style: italic;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.375rem;
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
    padding: 0.75rem 0.875rem !important;
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
    padding: 0.75rem 0.5rem !important;
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
</style>
