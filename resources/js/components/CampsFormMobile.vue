<template>
    <div class="min-h-screen bg-gray-50 overflow-x-hidden">
        <div
            id="camps-form-mobile"
            class="max-w-md mx-auto bg-white min-h-screen relative overflow-hidden"
        >
            <!-- Mobile Header -->
            <div
                v-if="step > 0"
                class="bg-white px-4 py-4 border-b border-gray-200"
            >
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
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-6m-2-5h6m-8 0V9a2 2 0 012-2h2a2 2 0 012 2v3m-6 0h4"
                                />
                            </svg>
                        </div>
                        <h1 class="text-base font-medium text-gray-900">
                            Schedule Camp
                        </h1>
                    </div>

                    <div class="w-8"></div>
                </div>

                <!-- Progress Steps -->
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

                <!-- Step Labels -->
                <div class="flex justify-center mt-2">
                    <span class="text-xs text-gray-600">
                        <template v-if="step === 1">Session Options</template>
                        <template v-else-if="step === 2">Student Info</template>
                        <template v-else-if="step === 3">Confirmation</template>
                        <template v-else-if="step === 4">Payment</template>
                        <template v-else-if="step === 5">Complete</template>
                    </span>
                </div>
            </div>

            <!-- Step 0: Topic Selection -->
            <div v-if="step === 0" class="p-2">
                <!-- Location Selector -->
                <div class="mb-1">
                    <div class="text-center mb-3">
                        <h2 class="text-base font-medium text-gray-900">
                            Choose Location
                        </h2>
                        <p class="text-xs text-gray-600">
                            Select your preferred camp location
                        </p>
                    </div>

                    <div
                        v-if="!locationsStore.locations.length"
                        class="text-center py-8"
                    >
                        <div
                            class="animate-spin w-8 h-8 mx-auto mb-2 text-blue-500"
                        >
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.65,6.35C16.2,4.9 14.21,4 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20C15.73,20 18.84,17.45 19.73,14H17.65C16.83,16.33 14.61,18 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6C13.66,6 15.14,6.69 16.22,7.78L13,11H20V4L17.65,6.35Z"
                                />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-600">
                            Loading locations...
                        </p>
                    </div>

                    <div v-else>
                        <label class="form-label">
                            Location
                            <span class="text-red-500">*</span>
                        </label>
                        <select
                            v-model="selected_location_id"
                            @change="handleLocationChange"
                            required
                            class="form-select"
                        >
                            <option value="" disabled>Select Location</option>
                            <option
                                v-for="location in locationsStore.locations"
                                :key="location.id"
                                :value="location.id"
                            >
                                {{ location.location_name }}
                            </option>
                        </select>
                    </div>
                </div>

                <!-- Camp Groups -->
                <div
                    v-if="locationsStore.location && campStore.groups_count > 0"
                    class="space-y-2"
                >
                    <div class="text-center mb-2">
                        <h2 class="text-base font-medium text-gray-900">
                            Choose Camp
                        </h2>
                        <p class="text-xs text-gray-600">
                            Select a camp category and topic
                        </p>
                    </div>

                    <div
                        v-for="(group, index) in campStore.groups"
                        :key="group.id"
                        class="border border-gray-200 rounded-lg"
                    >
                        <button
                            @click="toggleAccordion(index)"
                            class="w-full px-3 text-left flex items-center justify-between bg-gray-50 rounded-t-lg hover:bg-gray-100 transition-colors"
                            :class="{ 'rounded-lg': !accordionOpen[index] }"
                        >
                            <h3
                                class="font-medium text-sm text-gray-900"
                                :class="
                                    group.isGroupLimitExceeded
                                        ? 'text-red-500'
                                        : ''
                                "
                            >
                                {{ group.name }}
                                {{
                                    group.isGroupLimitExceeded ? " (Full)" : ""
                                }}
                            </h3>
                            <svg
                                class="w-4 h-4 transition-transform duration-200"
                                :class="{ 'rotate-180': accordionOpen[index] }"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </button>

                        <div
                            class="overflow-hidden transition-all duration-300"
                            :class="
                                accordionOpen[index]
                                    ? 'max-h-screen opacity-100'
                                    : 'max-h-0 opacity-0'
                            "
                        >
                            <div class="p-2 space-y-1">
                                <camps-slider
                                    :camps_data="group.topics"
                                    :group_data="group"
                                    :seasonal_camps_dp="seasonal_camps_dp"
                                    :seasonal_camps_fp="seasonal_camps_fp"
                                    :selected_location_price="
                                        locationsStore.location.starting_price
                                    "
                                    @topic-selected="enrollTopicSelected"
                                ></camps-slider>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    v-else-if="
                        locationsStore.location && !campStore.groups_count
                    "
                    class="text-center py-8"
                >
                    <p class="text-gray-500">
                        No camps available for this location
                    </p>
                </div>
            </div>

            <!-- Step Content -->
            <div v-if="step > 0" class="flex-1 overflow-hidden">
                <div class="p-4 h-full flex flex-col">
                    <!-- Step 1: Session Options -->
                    <section v-if="step === 1">
                        <div class="text-center mb-4">
                            <h3
                                class="text-base font-medium text-gray-900 mb-1"
                            >
                                {{ currentRegistration.group?.name }}
                            </h3>
                            <p class="text-sm text-gray-600">
                                {{
                                    currentRegistration.location?.location_name
                                }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ currentRegistration.location?.address }}
                            </p>
                        </div>

                        <form @submit.prevent="next()" class="space-y-4 flex-1">
                            <div>
                                <label class="form-label">
                                    Choose Session ({{
                                        filters.format_time_zone(
                                            currentRegistration.timezone
                                        )
                                    }})
                                    <span class="text-red-500">*</span>
                                </label>
                                <select
                                    v-model="currentRegistration.session"
                                    required
                                    @change="calculateAmount"
                                    class="form-select mobile-dropdown"
                                >
                                    <option disabled selected value="">
                                        Choose Camp
                                    </option>
                                    <option
                                        v-for="session in campStore.group_sessions"
                                        :key="session.id"
                                        :value="session"
                                        :disabled="
                                            session.isLimitExceeded ||
                                            (session.is_full_session &&
                                                !session.isLimitAvailable)
                                        "
                                        class="dropdown-option"
                                    >
                                        {{ session.name }}:
                                        {{ session.starts_at }}-{{
                                            session.ends_at
                                        }}
                                        ${{ session.price }}
                                        {{
                                            session.isLimitExceeded ||
                                            (session.is_full_session &&
                                                !session.isLimitAvailable)
                                                ? " (Full)"
                                                : ""
                                        }}
                                    </option>
                                </select>
                            </div>

                            <div
                                v-if="
                                    currentRegistration.group?.optional_date &&
                                    currentRegistration.session
                                "
                                class="flex items-center"
                            >
                                <input
                                    type="checkbox"
                                    v-model="currentRegistration.optional_date"
                                    @change="calculateAmount"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                />
                                <label class="ml-3 text-sm text-gray-600">
                                    Friday:
                                    <span class="text-blue-600 font-medium"
                                        >${{
                                            currentRegistration.session
                                                .optional_price
                                        }}</span
                                    >
                                    (Optional)
                                </label>
                            </div>

                            <div class="mt-6">
                                <button
                                    type="submit"
                                    class="form-button form-button-primary"
                                >
                                    Add Student
                                </button>
                            </div>
                        </form>
                    </section>

                    <!-- Step 2: Student Info -->
                    <section v-if="step === 2">
                        <div class="text-center mb-4">
                            <h3
                                class="text-base font-medium text-gray-900 mb-1"
                            >
                                Student Information
                            </h3>
                            <p class="text-sm text-gray-600">
                                Enter parent and student details
                            </p>
                        </div>

                        <form @submit.prevent="next()" class="space-y-4 flex-1">
                            <div
                                v-if="registrations.length == 1"
                                class="space-y-4"
                            >
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
                                        @blur="getStudentsData"
                                        @country-changed="getStudentsData"
                                        :autoDefaultCountry="true"
                                        required
                                    ></vue-tel-input>
                                </div>

                                <div>
                                    <label class="form-label">
                                        Email
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        placeholder="Email"
                                        v-model="
                                            currentRegistration.parent.email
                                        "
                                        required
                                        class="form-input"
                                    />
                                </div>
                            </div>

                            <div
                                v-if="studentStore.students.length"
                                class="space-y-4"
                            >
                                <div>
                                    <label class="form-label">
                                        Select a Student
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <p class="text-xs text-gray-500 mb-3">
                                        Select existing students or add new
                                    </p>

                                    <!-- Multiselect Dropdown -->
                                    <div
                                        class="relative"
                                        ref="dropdownContainer"
                                    >
                                        <div
                                            @click="toggleDropdown"
                                            class="form-input cursor-pointer hover:bg-gray-50 transition-colors min-h-[3rem] flex items-center"
                                        >
                                            <div
                                                class="flex items-center justify-between w-full"
                                            >
                                                <div class="flex-1">
                                                    <div
                                                        v-if="
                                                            currentRegistration
                                                                .students
                                                                .length === 0
                                                        "
                                                        class="text-gray-500"
                                                    >
                                                        Select students...
                                                    </div>
                                                    <div
                                                        v-else
                                                        class="flex flex-wrap gap-2"
                                                    >
                                                        <span
                                                            v-for="student in currentRegistration.students"
                                                            :key="student.id"
                                                            class="selected-student-tag"
                                                        >
                                                            {{
                                                                student.full_name
                                                            }}
                                                            <button
                                                                @click.stop="
                                                                    removeStudent(
                                                                        student
                                                                    )
                                                                "
                                                                class="tag-remove-btn"
                                                            >
                                                                <svg
                                                                    class="w-4 h-4"
                                                                    fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                >
                                                                    <path
                                                                        fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"
                                                                    ></path>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <svg
                                                    class="w-5 h-5 text-gray-400 transition-transform duration-200 ml-2 flex-shrink-0"
                                                    :class="{
                                                        'rotate-180':
                                                            isDropdownOpen,
                                                    }"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 9l-7 7-7-7"
                                                    ></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Dropdown Options -->
                                        <div
                                            v-show="isDropdownOpen"
                                            class="dropdown-menu"
                                        >
                                            <div class="p-1">
                                                <div
                                                    v-for="student in studentStore.students"
                                                    :key="student.id"
                                                    @click="
                                                        toggleStudent(student)
                                                    "
                                                    class="dropdown-item"
                                                >
                                                    <input
                                                        type="checkbox"
                                                        :checked="
                                                            isStudentSelected(
                                                                student
                                                            )
                                                        "
                                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mr-3 flex-shrink-0"
                                                        @click.stop
                                                    />
                                                    <label
                                                        class="text-sm font-medium text-gray-700 cursor-pointer flex-1"
                                                    >
                                                        {{ student.full_name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button
                                    type="button"
                                    @click="addANewStudent"
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

                            <!-- Fallback when no existing students -->
                            <div v-else class="space-y-4">
                                <div
                                    class="text-center p-4 bg-gray-50 rounded-lg"
                                >
                                    <p class="text-sm text-gray-600 mb-4">
                                        No existing students found. Add your
                                        first student below.
                                    </p>
                                    <button
                                        type="button"
                                        @click="addANewStudent"
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

                            <div
                                v-if="studentStore.addStudent"
                                class="space-y-4 rounded-lg"
                            >
                                <h6 class="text-gray-900">Add New Student</h6>
                                <div class="space-y-3">
                                    <div>
                                        <label class="form-label">
                                            Student Name
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            placeholder="Student Name"
                                            v-model="
                                                currentRegistration.student
                                                    .full_name
                                            "
                                            required
                                            class="form-input"
                                        />
                                    </div>
                                    <div>
                                        <label class="form-label">
                                            Age
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="number"
                                            placeholder="Age"
                                            v-model="
                                                currentRegistration.student.age
                                            "
                                            required
                                            class="form-input"
                                        />
                                    </div>
                                    <button
                                        type="button"
                                        @click="addStudentToParentInMultiCamps"
                                        class="form-button form-button-primary"
                                    >
                                        Add Student
                                    </button>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button
                                    type="submit"
                                    :disabled="!isNextButtonEnabled"
                                    class="form-button form-button-primary"
                                >
                                    Next
                                </button>
                            </div>
                        </form>
                    </section>

                    <!-- Step 3: Confirmation -->
                    <section v-if="step === 3">
                        <div class="text-center mb-4">
                            <h3
                                class="text-base font-medium text-gray-900 mb-1"
                            >
                                Confirm Your Booking
                            </h3>
                            <p class="text-xs text-gray-600">
                                Review your camp registration details
                            </p>
                        </div>

                        <div class="space-y-3 flex-1 overflow-y-auto">
                            <!-- Registration Details -->
                            <div
                                v-for="(student, index) in allStudents"
                                :key="index"
                                class="p-3 bg-gray-50 rounded-lg space-y-1.5"
                            >
                                <h6
                                    class="text-sm font-semibold text-gray-900 mb-2"
                                >
                                    Camp Registration {{ index + 1 }}
                                </h6>

                                <div class="text-xs text-gray-600 space-y-1">
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Student:</span
                                        >
                                        {{ student.full_name }}
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Camp:</span
                                        >
                                        {{ student.group.name }}
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Topic:</span
                                        >
                                        {{ student.topic.name }}
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Location:</span
                                        >
                                        {{ student.location.address }}
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Time:</span
                                        >
                                        {{ student.camp_timing }}
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Price:</span
                                        >
                                        <span
                                            class="font-semibold text-green-600"
                                            >${{
                                                student.amount?.toFixed(2) ||
                                                "0.00"
                                            }}</span
                                        >
                                    </p>
                                </div>
                            </div>

                            <!-- Parent Details -->
                            <div class="p-3 bg-blue-50 rounded-lg space-y-1.5">
                                <h6 class="text-sm font-semibold text-gray-900">
                                    Parent Details
                                </h6>
                                <div class="text-xs text-gray-600 space-y-1">
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Email:</span
                                        >
                                        {{ allStudents[0]?.parent?.email }}
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Phone:</span
                                        >
                                        {{
                                            allStudents[0]?.parent
                                                ?.phone_number ||
                                            allStudents[0]?.phone
                                                ?.nationalNumber
                                        }}
                                    </p>
                                </div>
                            </div>

                            <!-- Total Amount -->
                            <div class="p-3 bg-green-50 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <h6
                                        class="text-sm font-semibold text-gray-900"
                                    >
                                        Total Amount
                                    </h6>
                                    <span
                                        class="text-lg font-bold text-green-600"
                                        >${{ totalAmount.toFixed(2) }}</span
                                    >
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="flex items-start space-x-2">
                                <input
                                    type="checkbox"
                                    v-model="termsAndConditions"
                                    required
                                    class="mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500 flex-shrink-0"
                                />
                                <label
                                    class="text-xs text-gray-600 leading-relaxed"
                                >
                                    I agree to the
                                    <a
                                        :href="drive_link"
                                        class="text-blue-600 hover:text-blue-800 underline"
                                        target="_blank"
                                    >
                                        terms of service, billing, and privacy
                                        policy
                                    </a>
                                    of Code With Us
                                </label>
                            </div>
                        </div>

                        <div class="mt-4 space-y-2">
                            <button
                                type="button"
                                @click="addMore()"
                                class="form-button form-button-secondary"
                            >
                                Add Another Camp
                            </button>
                            <button
                                type="button"
                                :disabled="!termsAndConditions"
                                @click="redirectToCheckout()"
                                class="form-button form-button-primary"
                            >
                                Book Camps
                            </button>
                        </div>
                    </section>

                    <!-- Step 4: Payment -->
                    <section v-if="step === 4">
                        <div class="text-center mb-6">
                            <h3
                                class="text-base font-medium text-gray-900 mb-1"
                            >
                                Payment
                            </h3>
                            <p class="text-sm text-gray-600">
                                Complete your camp registration
                            </p>
                        </div>

                        <form
                            id="campSignUpForm"
                            @submit.prevent="getPaymentMethod"
                        >
                            <div id="checkout" class="mb-4">
                                <!-- Checkout will insert the payment form here -->
                            </div>

                            <p
                                v-if="stripe_error"
                                class="text-red-500 text-sm mb-4"
                            >
                                Error: {{ stripe_error }}
                            </p>
                        </form>
                    </section>

                    <!-- Step 5: Success -->
                    <section v-if="step === 5">
                        <div class="text-center mb-6">
                            <div
                                class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"
                            >
                                <svg
                                    class="w-8 h-8 text-green-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                            </div>
                            <h3
                                class="text-base font-medium text-gray-900 mb-2"
                            >
                                Thank you!
                            </h3>
                            <p class="text-sm text-gray-600">
                                You successfully booked your camps!
                            </p>
                        </div>

                        <div class="space-y-4">
                            <!-- Registration Summary -->
                            <div
                                v-for="(student, index) in allStudents"
                                :key="index"
                                class="p-4 bg-green-50 rounded-lg space-y-2"
                            >
                                <h6 class="font-medium text-gray-900">
                                    Camp Registration {{ index + 1 }}
                                </h6>

                                <div class="text-sm text-gray-600 space-y-1">
                                    <p>
                                        <span class="font-medium"
                                            >Student:</span
                                        >
                                        {{ student.full_name }}
                                    </p>
                                    <p>
                                        <span class="font-medium">Camp:</span>
                                        {{ student.group.name }}
                                    </p>
                                    <p>
                                        <span class="font-medium">Topic:</span>
                                        {{ student.topic.name }}
                                    </p>
                                    <p>
                                        <span class="font-medium"
                                            >Location:</span
                                        >
                                        {{ student.location.address }}
                                    </p>
                                    <p>
                                        <span class="font-medium">Time:</span>
                                        {{ student.camp_timing }}
                                    </p>
                                    <p>
                                        <span class="font-medium"
                                            >Amount Paid:</span
                                        >
                                        ${{
                                            student.amount?.toFixed(2) || "0.00"
                                        }}
                                    </p>
                                </div>
                            </div>

                            <!-- Parent Details -->
                            <div class="p-3 bg-blue-50 rounded-lg space-y-1.5">
                                <h6 class="text-sm font-semibold text-gray-900">
                                    Parent Details
                                </h6>
                                <div class="text-xs text-gray-600 space-y-1">
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Email:</span
                                        >
                                        {{ allStudents[0]?.parent?.email }}
                                    </p>
                                    <p>
                                        <span class="font-medium text-gray-800"
                                            >Phone:</span
                                        >
                                        {{
                                            allStudents[0]?.parent
                                                ?.phone_number ||
                                            allStudents[0]?.phone
                                                ?.nationalNumber
                                        }}
                                    </p>
                                </div>
                            </div>

                            <!-- Final Total -->
                            <div class="p-3 bg-blue-50 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <h6 class="font-medium text-gray-900">
                                        Total Paid
                                    </h6>
                                    <span
                                        class="text-lg font-bold text-blue-600"
                                        >${{ totalAmount.toFixed(2) }}</span
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600 mb-4">
                                Don't see something that fits your schedule?
                            </p>
                            <a
                                href="mailto:info@codewithus.com"
                                class="text-blue-600 hover:text-blue-800 text-sm underline"
                            >
                                Send a custom request to the team
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <loader></loader>
    <Notification></Notification>
</template>

<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
import { useLocationsStore } from "../store/locations";
import { useCampStore } from "../store/campStore";
import { useFiltersStore } from "../store/filtersStore";
import { useStudentsStore } from "../store/studentsStore";
import useCampsFormMixin from "../mixins/useCampsFormMixin";

let stripe = Stripe(
    "pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69"
);

let elements = stripe.elements();
let cardElement = undefined;
let form = undefined;
let style = {
    base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        margin: "5px",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4",
        },
    },
    invalid: {
        color: "#fa755a",
        iconColor: "#fa755a",
    },
};

export default {
    name: "CampsFormMobile",
    mixins: [useCampsFormMixin],
    props: ["seasonal_camps_dp", "seasonal_camps_fp"],
    components: { Carousel, Slide, Pagination, Navigation },
    setup() {
        const locationsStore = useLocationsStore();
        const campStore = useCampStore();
        const filters = useFiltersStore();
        const studentStore = useStudentsStore();
        return {
            locationsStore,
            campStore,
            filters,
            studentStore,
        };
    },
    data() {
        return {
            planId: "price_1ORmEhF9uOieGMSt6mJawIEt",
            isModalEnroll: false,
            isModalOpen: false,
            isDropdownOpen: false,
            step: 0,
            addStudent: false,
            bookForm: false,
            settings: {
                itemsToShow: 1,
                snapAlign: "center",
            },
            breakpoints: {
                600: {
                    itemsToShow: 2,
                    snapAlign: "center",
                },
                1024: {
                    itemsToShow: 4,
                    snapAlign: "start",
                },
            },
            registrations: [],
            currentRegistration: {
                phone: null,
                group: null,
                topic: null,
                session: "",
                type: "camps",
                class_type: "Camps",
                selected_date: new Date(),
                location: null,
                optional_date: false,
                students: [],
                student: {
                    id: "",
                    full_name: "",
                    age: "",
                    email: "",
                },
                parent: {
                    id: "",
                    full_name: "",
                    age: "",
                    email: "",
                    stripe_id: "",
                },
                timezone: "America/Los_Angeles",
            },
            totalAmount: 0,
            preferredCountries: ["US", "GB", "CA", "CN", "IN"],
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: "",
                    placeholder: "Phone Number",
                },
            },
            termsAndConditions: false,
            voucherCode: "",
            agreeToTerms: false,
            drive_link: "https://example.com/terms-of-service",
            selected_location_id: "",
            tempGroups: [],
            checkout: null,
            accordionOpen: [],
            stripe_error: null,
            coupons: {
                id: null,
                isValid: false,
                amount_off: 0,
            },
            serverTotalAmount: 0,
        };
    },
    created() {
        this.locationsStore
            .fetchFormsLocations({ location_type: "camps" })
            .then(() => {
                const selectedLocation = this.locationsStore.location;
                if (selectedLocation && selectedLocation.id === 19) {
                    this.changeLocation(selectedLocation);
                }
            });
        this.addNewRegistration();
    },
    computed: {
        totalAmount() {
            return this.serverTotalAmount > 0
                ? this.serverTotalAmount
                : this.registrations.reduce((total, registration) => {
                      return (
                          total + this.calculateRegistrationAmount(registration)
                      );
                  }, 0);
        },
        allStudents() {
            return this.registrations.flatMap((registration) => {
                const discount = this.calculateDiscount(
                    registration,
                    this.getCoupon(registration)
                );

                return registration.students.map((student) => ({
                    ...student,
                    group: registration.group,
                    session: registration.session,
                    topic: registration.topic,
                    location: registration.location,
                    optional_date: registration.optional_date,
                    timezone: registration.timezone,
                    parent: registration.parent,
                    phone: registration.phone,
                    camp_timing:
                        registration.session.starts_at +
                        " to " +
                        registration.session.ends_at,
                    ...discount,
                }));
            });
        },
        isNextButtonEnabled() {
            const hasSelectedStudents =
                this.currentRegistration.students &&
                this.currentRegistration.students.length > 0;
            console.log(hasSelectedStudents, "hasSelectedStudents");
            const hasAddStudentMode = this.studentStore.addStudent;
            return hasSelectedStudents || hasAddStudentMode;
        },
    },
    methods: {
        // Mobile-specific methods that are not in the mixin
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        isStudentSelected(student) {
            return this.currentRegistration.students.some(
                (s) => s.id === student.id
            );
        },
        removeStudent(student) {
            const index = this.currentRegistration.students.findIndex(
                (s) => s.id === student.id
            );
            if (index > -1) {
                const newStudents = [...this.currentRegistration.students];
                newStudents.splice(index, 1);
                this.currentRegistration.students = newStudents;
            }
        },
        handleClickOutside(event) {
            if (
                this.$refs.dropdownContainer &&
                !this.$refs.dropdownContainer.contains(event.target)
            ) {
                this.isDropdownOpen = false;
            }
        },
        handleLocationChange() {
            const selectedLocation = this.locationsStore.locations.find(
                (location) => location.id == this.selected_location_id
            );
            if (selectedLocation) {
                this.changeLocation(selectedLocation);
            }
        },
    },
    mounted() {
        this.$nextTick(() => {
            this.accordionOpen = this.campStore.groups.map(
                (_, index) => index === 0
            );
        });
        // Add click outside listener for dropdown
        document.addEventListener("click", this.handleClickOutside);
    },
    beforeUnmount() {
        // Remove click outside listener
        document.removeEventListener("click", this.handleClickOutside);
    },
    watch: {
        "campStore.groups": {
            handler(newGroups) {
                if (newGroups && newGroups.length > 0) {
                    this.accordionOpen = newGroups.map(
                        (_, index) => index === 0
                    );
                }
            },
            immediate: true,
        },
        "locationsStore.location": {
            handler(newLocation) {
                if (newLocation && newLocation.id) {
                    this.selected_location_id = newLocation.id;
                }
            },
            immediate: true,
        },
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

/* Global mobile responsiveness */
* {
    box-sizing: border-box;
    max-width: 100%;
}

select,
option {
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
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
    border: 2px solid #3b82f6;
}

.form-button-secondary:hover {
    background-color: #eff6ff;
}

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

/* Add New Student Button - Matching TrialFormMobile.vue */
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
}

.add-new-student-button:hover {
    background-color: #dbeafe;
    border-color: #2563eb;
}

.add-new-student-button:active {
    background-color: #bfdbfe;
}

/* Student list items styling */
.flex.items-center.p-3 {
    transition: background-color 0.2s ease;
}

.flex.items-center.p-3:hover {
    background-color: #f9fafb;
}

/* Multiselect dropdown styles */
.multiselect-dropdown {
    position: relative;
}

.dropdown-toggle {
    min-height: 3.5rem;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 50;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 0.75rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    max-height: 15rem;
    overflow-y: auto;
}

.selected-student-tag {
    display: inline-flex;
    align-items: center;
    padding: 0.375rem 0.75rem;
    background-color: #dbeafe;
    color: #1e40af;
    border-radius: 9999px;
    font-size: 0.875rem;
    font-weight: 500;
    margin: 0.125rem;
}

.tag-remove-btn {
    margin-left: 0.5rem;
    cursor: pointer;
    transition: color 0.2s;
    width: 1rem;
    height: 1rem;
}

.tag-remove-btn:hover {
    color: #1e3a8a;
}

/* Ensure dropdown items have proper touch targets */
.dropdown-item {
    padding: 0.75rem;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.2s;
    min-height: 3rem;
}

.dropdown-item:hover {
    background-color: #f9fafb;
}

/* Fix for mobile tap targets */
@media (max-width: 640px) {
    .dropdown-item {
        min-height: 3.5rem;
        padding: 1rem 0.75rem;
    }

    .selected-student-tag {
        font-size: 0.875rem;
        padding: 0.5rem 0.75rem;
    }

    .tag-remove-btn {
        width: 1.25rem;
        height: 1.25rem;
    }
}

/* Mobile dropdown styling */
.mobile-dropdown {
    max-width: 100%;
    box-sizing: border-box;
}

.dropdown-option {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    line-height: 1.2;
}

/* Compact accordion styling */
.accordion-button {
    padding: 0.5rem 0.75rem !important;
}

.accordion-content {
    padding: 0.5rem !important;
}

/* Reduce title spacing */
.text-center.mb-3 h2 {
    margin-bottom: 0.25rem;
}

.text-center.mb-3 p {
    margin-bottom: 0;
}

/* Mobile-specific improvements */
@media (max-width: 640px) {
    #camps-form-mobile {
        margin: 0;
        max-width: 100%;
        border-radius: 0;
        overflow-x: hidden;
    }

    .form-button {
        min-height: 44px;
        font-size: 1rem;
    }

    .form-input,
    .form-select {
        font-size: 1rem;
        padding: 1rem;
        max-width: 100%;
        box-sizing: border-box;
    }

    .space-y-4 > * + * {
        margin-top: 1rem;
    }

    /* Compact location tabs and accordion */
    .location-tab {
        padding: 0.5rem 0.75rem;
        font-size: 0.8rem;
    }

    .location-tab .font-medium {
        font-size: 0.85rem;
    }

    .accordion-header {
        padding: 0.5rem 0.75rem;
        font-size: 0.8rem;
    }

    .accordion-content {
        padding: 0.5rem;
    }

    /* Reduce spacing between accordion items */
    .space-y-2 > * + * {
        margin-top: 0.5rem;
    }

    .space-y-1 > * + * {
        margin-top: 0.25rem;
    }

    /* Fix dropdown overflow on mobile */
    .mobile-dropdown {
        font-size: 0.875rem;
        max-width: calc(100vw - 2rem);
        overflow: hidden;
    }

    .dropdown-option {
        font-size: 0.8rem;
        padding: 0.75rem 0.5rem;
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        max-width: 100%;
        line-height: 1.4;
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
