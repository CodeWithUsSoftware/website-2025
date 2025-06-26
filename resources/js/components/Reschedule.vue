<template>
    <div
        class="max-w-5xl bg-white rounded-2xl mx-auto shadow-card py-10 overflow-x-hidden"
        v-if="showForm"
    >
        <div v-if="step < 6" class="hidden sm:flex justify-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol
                    role="list"
                    class="bg-white rounded-md shadow px-6 flex space-x-4"
                >
                    <li class="flex">
                        <div class="flex items-center">
                            <a
                                href="#reschedule"
                                @click="step = 1"
                                class="text-gray-400 hover:text-gray-500 cursor-pointer"
                                :class="step === 1 ? ' py-2' : ''"
                            >
                                <div v-if="step === 1">
                                    <img
                                        :class="
                                            step === 1
                                                ? 'bg-primary hover:bg-primary-darker-1 w-20 h-20'
                                                : 'bg-gray-500 hover:bg-gray-700'
                                        "
                                        width="24"
                                        height="24"
                                        src="/images/trial_form/monthly_form.webp"
                                        alt=""
                                    />
                                    <span class="sr-only">Home</span>
                                </div>
                                <div v-else>
                                    <a
                                        @click="step = 1"
                                        href="#reschedule"
                                        class="ml-4 text-sm"
                                        :class="
                                            step === 1
                                                ? 'text-primary hover:text-primary-darker-1'
                                                : 'text-gray-500 hover:text-gray-700'
                                        "
                                        >Student Info</a
                                    >
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="flex" v-if="step > 1">
                        <div class="flex items-center">
                            <svg
                                class="flex-shrink-0 w-6 h-full text-gray-200"
                                viewBox="0 0 24 44"
                                preserveAspectRatio="none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"
                                />
                            </svg>
                            <a
                                @click="step = 2"
                                href="#reschedule"
                                class="ml-4 text-sm"
                                :class="
                                    step === 2
                                        ? 'text-primary hover:text-primary-darker-1'
                                        : 'text-gray-500 hover:text-gray-700'
                                "
                                >Credentials</a
                            >
                        </div>
                    </li>

                    <li class="flex" v-if="step > 2">
                        <div class="flex items-center">
                            <svg
                                class="flex-shrink-0 w-6 h-full text-gray-200"
                                viewBox="0 0 24 44"
                                preserveAspectRatio="none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"
                                />
                            </svg>
                            <a
                                @click="step = 3"
                                :class="
                                    step === 3
                                        ? 'text-primary hover:text-primary-darker-1'
                                        : 'text-gray-500 hover:text-gray-700'
                                "
                                href="#reschedule"
                                class="ml-4 text-sm"
                                aria-current="page"
                                >Existing Class</a
                            >
                        </div>
                    </li>

                    <li class="flex" v-if="step > 3 && !reschedule.cancel">
                        <div class="flex items-center">
                            <svg
                                class="flex-shrink-0 w-6 h-full text-gray-200"
                                viewBox="0 0 24 44"
                                preserveAspectRatio="none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"
                                />
                            </svg>
                            <a
                                @click="step = 4"
                                :class="
                                    step === 4
                                        ? 'text-primary hover:text-primary-darker-1'
                                        : 'text-gray-500 hover:text-gray-700'
                                "
                                href="#reschedule"
                                class="ml-4 text-sm"
                                aria-current="page"
                                >Make-up Class</a
                            >
                        </div>
                    </li>

                    <li class="flex" v-if="step > 4">
                        <div class="flex items-center">
                            <svg
                                class="flex-shrink-0 w-6 h-full text-gray-200"
                                viewBox="0 0 24 44"
                                preserveAspectRatio="none"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <path
                                    d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"
                                />
                            </svg>
                            <a
                                :class="
                                    step === 5
                                        ? 'text-primary hover:text-primary-darker-1'
                                        : 'text-gray-500 hover:text-gray-700'
                                "
                                href="#reschedule"
                                class="ml-4 text-sm"
                                aria-current="page"
                                >Confirmation</a
                            >
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div
            v-if="step < 6"
            class="sm:hidden bg-white rounded-md shadow px-4 py-3"
        >
            <div class="flex flex-col items-center justify-center space-y-2">
                <!-- Current Step Title (centered) -->
                <span class="text-sm font-medium text-gray-700 text-center">
                    <template v-if="step === 1">Student Info</template>
                    <template v-else-if="step === 2">Credentials</template>
                    <template v-else-if="step === 3">Existing Class</template>
                    <template v-else-if="step === 4 && !reschedule.cancel"
                        >Make-up Class</template
                    >
                    <template v-else-if="step === 5">Confirmation</template>
                </span>

                <!-- Back Button -->
                <button
                    v-if="step > 1"
                    @click="step -= 1"
                    class="px-4 py-1 text-xs text-primary border border-primary rounded-full flex items-center justify-center shadow-sm hover:bg-primary hover:text-white transition"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-3 w-3"
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
                    <span>Back</span>
                </button>
            </div>
        </div>

        <div class="text-center" v-if="step < 5">
            <h4>{{ schedule_a_makeup_class_heading }}</h4>
            <p v-if="step === 1">{{ schedule_a_makeup_class_text }}</p>
        </div>

        <transition :name="slide_animation">
            <div class="md:px-32" v-if="step === 1">
                <div class="space-y-4">
                    <div class="pt-2">
                        <div class="mt-6 grid grid-cols-1 gap-3 md:gap-6">
                            <div class="px-4">
                                <label class="block text-sm text-gray-700 flex"
                                    >Number
                                    <span class="text-danger font-bold text-xl"
                                        >*</span
                                    >
                                </label>
                                <div class="mt-1">
                                    <vue-tel-input
                                        v-bind="bindProps"
                                        :preferredCountries="preferredCountries"
                                        :autoFormat="false"
                                        @input="phoneInput"
                                        @focus="resetStudentInfoStep"
                                        v-model="phone"
                                        :autoDefaultCountry="true"
                                        :defaultCountry="
                                            countries.countries.character_code
                                        "
                                        required
                                    ></vue-tel-input>

                                    <small
                                        v-if="errors && errors.phone_number"
                                        class="text-red-500"
                                        >{{
                                            errors.errors.phone_number[0]
                                        }}</small
                                    >
                                    <div
                                        v-if="errorMessage"
                                        class="text-red-500 text-sm text-center pt-2"
                                    >
                                        {{ errorMessage }}
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <fieldset
                                    class="mt-6 px-4"
                                    v-if="existingStudents.length"
                                >
                                    <div>
                                        <div class="text-black-lighter-2 flex">
                                            Select a Student
                                            <span
                                                class="text-danger font-bold text-xl"
                                                >*</span
                                            >
                                        </div>
                                        <p class="text-sm text-gray-500">
                                            Select an existing student below or
                                            add new
                                        </p>
                                    </div>
                                    <div
                                        class="grid grid-cols-1 md:grid-cols-3 mt-4 space-y-2"
                                    >
                                        <div
                                            class="flex items-center"
                                            v-for="s in existingStudents"
                                        >
                                            <input
                                                type="radio"
                                                name="student"
                                                :value="s"
                                                v-model="reschedule.student"
                                                class="focus:ring-primary h-4 w-4 text-primary border-gray-300"
                                                required
                                            />
                                            <label
                                                class="ml-3 block text-sm text-gray-700 capitalize"
                                                >{{ s.full_name }}</label
                                            >
                                        </div>
                                    </div>
                                </fieldset>
                                <div v-if="loader" class="flex justify-center">
                                    <!-- <Loader class="mt-10 w-20 h-203 animate-spin text-success" variants="h-10 w-10" /> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center" v-if="existingStudents.length">
                    <fieldset class="mt-6 px-4">
                        <p class="text-sm text-gray-500 text-left flex">
                            Select verification method:
                            <span class="text-danger font-bold text-xl">*</span>
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 mt-4">
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    name="verification"
                                    value="code"
                                    v-model="reschedule.type"
                                    class="focus:ring-primary h-4 w-4 text-primary border-gray-300"
                                    required
                                />
                                <label
                                    class="ml-3 block text-sm text-gray-700 capitalize"
                                    >Get Verification Code</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    name="verification"
                                    value="password"
                                    v-model="reschedule.type"
                                    class="focus:ring-primary h-4 w-4 text-primary border-gray-300"
                                    required
                                />
                                <label
                                    class="ml-3 block text-sm text-gray-700 capitalize"
                                    >Enter Students Password</label
                                >
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="pt-5 text-center px-3">
                    <transition name="fade">
                        <button
                            @click="onPhoneNumberEnter"
                            v-if="!existingStudents.length"
                            :disabled="!this.phoneObject.valid"
                            type="button"
                            class="w-full md:w-52 disabled:opacity-50 disabled:cursor-not-allowed shadow-primary space-x-2 inline-flex items-center justify-center py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                        >
                            <span>Fetch Students</span>
                            <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                        </button>
                        <button
                            v-else
                            @click="submitStepOne"
                            type="button"
                            :disabled="
                                buttonLoader ||
                                !reschedule.student.id ||
                                !reschedule.type
                            "
                            class="w-full md:w-52 disabled:opacity-50 disabled:cursor-not-allowed shadow-primary space-x-2 inline-flex items-center justify-center py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                        >
                            <span>Next</span>
                            <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                        </button>
                    </transition>
                </div>
            </div>
        </transition>

        <!-- Verification Step -->
        <transition :name="slide_animation">
            <form
                class="md:px-32 md:space-y-5 px-4"
                v-if="step === 2"
                @submit.prevent="studentVerification"
            >
                <div v-if="reschedule.type === 'password'">
                    <label class="block text-sm text-gray-700 flex"
                        >Password
                        <span class="text-danger font-bold text-xl">*</span>
                    </label>
                    <div class="mt-1">
                        <input
                            v-model="reschedule.pass_code"
                            type="password"
                            required
                            autocomplete="off"
                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                        />
                        <div class="flex items-center justify-start mt-2">
                            <div
                                v-if="errorMessage"
                                class="text-red-500 text-sm"
                            >
                                {{ errorMessage }}
                            </div>
                            <div
                                class="text-primary cursor-pointer text-sm"
                                @click="resetPassword"
                            >
                                Forgot password? Click to reset!
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="reschedule.type === 'code'">
                    <label class="block text-sm text-gray-700 flex pb-2 flex"
                        >Enter Verification Code:
                        <span class="text-danger font-bold text-xl">*</span>
                    </label>
                    <div class="mt-1">
                        <input
                            v-model="reschedule.pass_code"
                            type="number"
                            required
                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                        />
                        <div
                            @click="reschedule.type = 'password'"
                            class="text-primary cursor-pointer text-sm mt-1"
                        >
                            Did not receive SMS, click to enter student
                            password!
                        </div>
                    </div>
                </div>
                <div class="py-2">
                    <button
                        type="submit"
                        :disabled="buttonLoader"
                        class="w-full disabled:opacity-50 disabled:cursor-not-allowed shadow-primary space-x-2 inline-flex items-center justify-center py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                    >
                        <span>Verify</span>
                        <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                    </button>
                </div>
            </form>
        </transition>

        <div class="text-center" v-if="step >= 3 && step < 5">
            <div v-if="reschedule.selectedClassToReschedule">
                <p>Class selected to reschedule:</p>
                <span class="capitalize">{{
                    reschedule.selectedClassToReschedule.name
                }}</span
                >, {{ reschedule.selectedClassToReschedule.starts_at }}, ({{
                    filters.format_time_zone(timezone)
                }})
                <span v-if="reschedule.selectedClassToReschedule.teacher.length"
                    >, Teacher:
                    {{
                        reschedule.selectedClassToReschedule.teacher[0]
                            .full_name
                    }}</span
                >
            </div>
        </div>

        <transition :name="slide_animation">
            <div class="md:px-32 md:space-y-5" v-if="step === 3">
                <div>
                    <h2
                        class="text-lg leading-6 font-medium text-center"
                        :class="
                            reschedule.selectedClassToReschedule
                                ? 'text-green-500'
                                : 'text-red-500'
                        "
                    >
                        <span v-if="available_time_slots.length">
                            <span class="text-left"
                                >Classes available to reschedule please click on
                                one to select:</span
                            >
                        </span>
                        <span
                            class="text-lg leading-6 font-medium text-danger"
                            v-if="!tasks_classes.length && step === 3"
                        >
                            No classes available for make-up
                        </span>
                    </h2>

                    <fieldset class="mt-2 space-y-2 px-4">
                        <div
                            class="divide-y divide-gray-200"
                            v-for="task_class in tasks_classes"
                        >
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div
                                class="relative flex flex-col md:flex-row items-start gap-2 py-4 border p-2 rounded-2xl items-center cursor-pointer"
                                @click="rescheduleNow(task_class)"
                                :class="
                                    reschedule.selectedClassToReschedule.id ===
                                    task_class.id
                                        ? 'border-primary border-2 bg-indigo-100'
                                        : ''
                                "
                            >
                                <div class="min-w-0 flex-1 text-sm">
                                    <label
                                        class="font-medium text-gray-700 capitalize"
                                        ><span class="text-primary"
                                            >Class:</span
                                        >
                                        {{ task_class.name }}</label
                                    >
                                    <p
                                        id="account-mastercard-description"
                                        class="text-gray-500"
                                    >
                                        <span class="text-primary"
                                            >Starts At:</span
                                        >
                                        {{ task_class.starts_at }} ({{
                                            filters.format_time_zone(timezone)
                                        }})
                                    </p>
                                    <p
                                        class="text-gray-500 capitalize"
                                        v-if="task_class.teacher.length"
                                    >
                                        <span class="text-primary"
                                            >Teacher:</span
                                        >
                                        {{ task_class.teacher[0].full_name }}
                                    </p>
                                </div>
                                <!-- <button v-if="task_class.students[0].pivot.rescheduled !== 2"  @click.stop="cancelClass(task_class)" type="button" class="mr-2 w-1/6 shadow-danger py-2 text-sm font-medium border border-danger rounded-full text-white bg-danger hover:bg-danger-darker-1 focus:outline-none ">
                    Cancel
                  </button>
                  <button @click.stop="testNew(task_class)" type="button" class="w-1/6 shadow-primary py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">
                    Reschedule
                  </button>
                  <div class=" flex items-center h-5">
                  </div> -->

                                <div
                                    class="w-full md:w-1/2 flex items-center gap-2"
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
                                        @click.stop="cancelClass(task_class)"
                                        type="button"
                                        class="w-full md:w-1/2 shadow-danger py-2 text-sm font-medium border border-danger rounded-full text-white bg-danger hover:bg-danger-darker-1 focus:outline-none"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        @click.stop="testNew(task_class)"
                                        type="button"
                                        class="w-full md:w-1/2 shadow-primary py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                                    >
                                        Reschedule
                                    </button>
                                    <div class="flex items-center h-5"></div>
                                </div>
                                <div
                                    class="flex flex-col md:flex-row gap-2 text-warning"
                                    v-else-if="
                                        !task_class.parent_id &&
                                        task_class.is_absent_rescheduled_after_class_starts ===
                                            1
                                    "
                                >
                                    Reach out to the admins if you have any
                                    questions.
                                </div>
                                <div
                                    class="flex flex-col md:flex-row gap-2 text-danger"
                                    v-else
                                >
                                    This is a Make Up Class, cannot be
                                    rescheduled!
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <!--        <div class="py-2">-->
                <!--          <button v-if="!reschedule.selectedClassToReschedule" type="submit" :disabled="buttonLoader || !tasks_classes.length || !reschedule.selectedClassToReschedule" class="w-full disabled:opacity-50 disabled:cursor-not-allowed shadow-primary space-x-2 inline-flex items-center justify-center py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">-->
                <!--            <span>Select a class above to go to next step</span>-->
                <!--          </button>-->
                <!--          <button v-else @click="testNew" type="submit" :disabled="buttonLoader || !tasks_classes.length || !reschedule.selectedClassToReschedule" class="w-full disabled:opacity-50 disabled:cursor-not-allowed shadow-primary space-x-2 inline-flex items-center justify-center py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">-->
                <!--            <span>Next</span>-->
                <!--            <Loader v-if="buttonLoader" variants="animate-spin" />-->
                <!--          </button>-->
                <!--        </div>-->
            </div>
        </transition>

        <transition :name="slide_animation">
            <form
                v-if="step === 4"
                @submit.prevent="next"
                class="divide-y divide-black-lighter-4"
            >
                <div class="space-y-8 pb-20">
                    <div class="py-2 px-5">
                        <div class="">
                            <label class="block text-sm text-gray-700 flex"
                                >Teachers
                                <span class="text-danger font-bold text-xl"
                                    >*</span
                                >
                            </label>
                            <div class="mt-1">
                                <select
                                    v-model="reschedule.showAllTeacher"
                                    @change="handleChangeInTeacher()"
                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
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
                                <small
                                    v-if="errors && errors.location_id"
                                    class="text-red-500"
                                    >{{ errors.location_id[0] }}</small
                                >
                            </div>
                        </div>
                        <div
                            class="mt-6 grid grid-cols-1 md:grid-cols-2 md:gap-2"
                        >
                            <vue-cal
                                style="height: 350px"
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
                                :selected-date="reschedule.selected_date_raw"
                                @cell-focus="dateClicked"
                                :disable-days="actualDays"
                            >
                            </vue-cal>
                            <div
                                class="space-y-1 max-h-96 overflow-y-auto px-0 md:px-10"
                            >
                                <div
                                    class="text-primary flex flex-col items-center justify-center md:flex-row"
                                    v-if="reschedule.selected_date"
                                >
                                    <div>
                                        {{
                                            filters.day_date(
                                                reschedule.selected_date_raw
                                            )
                                        }}
                                    </div>
                                    <div class="md:pl-2">
                                        ({{
                                            filters.format_time_zone(timezone)
                                        }})
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="text-primary text-center">
                                        Select Date
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-center"
                                    v-if="loader"
                                >
                                    <!-- <Loader class="mt-10 w-20 h-203 animate-spin text-success" variants="h-10 w-10" /> -->
                                </div>

                                <span>
                                    <div
                                        class="flex items-center justify-center px-10 py-10"
                                        v-if="
                                            Object.keys(available_time_slots)
                                                .length === 0 && !loader
                                        "
                                    >
                                        <p class="text-green-500 text-center">
                                            Please select another date in
                                            calendar to load available time
                                            slots
                                        </p>
                                    </div>
                                    <div
                                        class="flex items-center justify-center px-10 py-10"
                                        v-if="!available_time_slots"
                                    >
                                        <p
                                            class="text-red-500 text-center"
                                            v-html="notification"
                                        ></p>
                                    </div>
                                </span>

                                <div
                                    class="grid grid-cols-3 gap-1 md:gap-4 text-center text-primary"
                                    v-if="
                                        available_time_slots &&
                                        Object.keys(available_time_slots)
                                            .length > 0
                                    "
                                >
                                    <span class="p-1 md:p-3 md:mx-2">Time</span>
                                    <span class="col-span-2 p-1 md:p-3 md:mx-2"
                                        >Teacher</span
                                    >
                                </div>

                                <div
                                    class="grid grid-cols-3 cursor-pointer gap-1 md:gap-4"
                                    v-for="slot in available_time_slots"
                                    :key="slot.slot"
                                    @click="selectClassHandler(slot)"
                                >
                                    <button
                                        type="button"
                                        class="p-1 md:p-3 md:mx-2 rounded-xl text-center"
                                        :class="
                                            reschedule.slot.id === slot.id &&
                                            reschedule.slot.teacher_id ===
                                                slot.teacher_id &&
                                            reschedule.slot.time_int ===
                                                slot.time_int
                                                ? 'bg-primary text-white w-full'
                                                : 'text-info bg-info-lighter-4 w-full'
                                        "
                                    >
                                        {{
                                            filters.timeOnly(
                                                slot.starts_at_local_time
                                            )
                                        }}
                                    </button>
                                    <button
                                        type="button"
                                        class="col-span-2 p-1 md:p-3 md:mx-2 rounded-xl text-center"
                                        :class="
                                            reschedule.slot.id === slot.id &&
                                            reschedule.slot.teacher_id ===
                                                slot.teacher_id &&
                                            reschedule.slot.time_int ===
                                                slot.time_int
                                                ? 'bg-primary text-white w-full'
                                                : 'text-info bg-info-lighter-4 w-full'
                                        "
                                    >
                                        {{ slot.teacher_name }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-10 px-4">
                    <div class="flex justify-center">
                        <button
                            type="submit"
                            :disabled="Object.keys(reschedule.slot).length < 2"
                            class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                        >
                            <span>Next</span>
                            <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                        </button>
                    </div>
                    <div
                        class="flex md:flex-col items-center justify-center space-x-3 py-3 pt-10 text-sm"
                    >
                        <p>Don’t see something that fits your schedule?</p>
                        <p class="underline text-primary">
                            Email request to info@codewithus.com
                        </p>
                    </div>
                </div>
            </form>
        </transition>

        <transition :name="slide_animation">
            <section v-if="step === 5">
                <div class="space-y-8 pb-20">
                    <div class="py-2 px-5">
                        <div class="text-center rounded-lg py-10">
                            {{
                                !this.reschedule.cancel
                                    ? "Rescheduling a Make-Up Class Confirmation"
                                    : "Cancel & Reschedule A Make-Up class Later"
                            }}
                            <p>
                                {{
                                    !this.reschedule.cancel
                                        ? "Are you sure you want to reschedule a make-up class as per the details below?"
                                        : "Are you sure you want to cancel & reschedule a make-up class later?"
                                }}
                            </p>
                            <!--              <div class="absolute right-5 top-5 cursor-pointer" @click="back">-->
                            <!--                <svg class="w-6 h-6" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                            <!--                  <circle opacity="0.2" cx="17" cy="17" r="17" fill="#FF9E45"/>-->
                            <!--                  <path d="M11.2511 11.2511C11.5858 10.9163 12.1285 10.9163 12.4632 11.2511L17 15.7878L21.5368 11.2511C21.8715 10.9163 22.4142 10.9163 22.7489 11.2511C23.0837 11.5858 23.0837 12.1285 22.7489 12.4632L18.2122 17L22.7489 21.5368C23.0837 21.8715 23.0837 22.4142 22.7489 22.7489C22.4142 23.0837 21.8715 23.0837 21.5368 22.7489L17 18.2122L12.4632 22.7489C12.1285 23.0837 11.5858 23.0837 11.2511 22.7489C10.9163 22.4142 10.9163 21.8715 11.2511 21.5368L15.7878 17L11.2511 12.4632C10.9163 12.1285 10.9163 11.5858 11.2511 11.2511Z" fill="#FF9E45"/>-->
                            <!--                </svg>-->
                            <!--              </div>-->
                        </div>

                        <form @submit.prevent="rescheduleClass">
                            <div class="space-y-20" v-if="!reschedule.cancel">
                                <div class="md:pl-52 space-y-2">
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Time:</span
                                            ></span
                                        >
                                        {{
                                            reschedule.slot.starts_at_local_time
                                        }}
                                        ({{
                                            filters.format_time_zone(timezone)
                                        }})
                                    </p>
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Teacher:</span
                                            ></span
                                        >
                                        <span class="capitalize">
                                            {{ reschedule.slot.teacher_name }}
                                        </span>
                                    </p>
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Student Name:</span
                                            ></span
                                        >
                                        <span class="capitalize">
                                            {{ reschedule.student.full_name }}
                                        </span>
                                    </p>
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Email:</span
                                            ></span
                                        >
                                        {{ reschedule.student.email }}
                                    </p>
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Phone Number:</span
                                            ></span
                                        >
                                        {{ reschedule.student.phone_number }}
                                    </p>
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Location:</span
                                            ></span
                                        >
                                        {{
                                            reschedule.selectedClassToReschedule
                                                .location.location_name
                                        }}
                                    </p>
                                </div>
                                <div class="text-center space-y-2">
                                    <button
                                        @click="back"
                                        type="button"
                                        class="shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-primary hover:bg-primary hover:text-white focus:outline-none"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        :disabled="buttonLoader"
                                        type="submit"
                                        class="shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                                    >
                                        <span>Yes, Reschedule!</span>
                                        <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                                    </button>
                                </div>
                            </div>
                            <div class="text-center">
                                <button
                                    v-if="reschedule.cancel"
                                    :disabled="buttonLoader"
                                    type="submit"
                                    class="shadow-primary space-x-2 inline-flex items-center px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                                >
                                    <span>Yes, Cancel & Reschedule Later!</span>
                                    <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </transition>

        <!-- Summary -->
        <transition :name="slide_animation">
            <section class="text-center py-16" v-if="step === 6">
                <h5 class="text-primary">Thank you!</h5>
                <p v-if="!reschedule.cancel">
                    You successfully rescheduled a make-up class, as per details
                    below:
                </p>
                <p v-else>
                    You successfully cancelled your class, you can visit this
                    form to choose another schedule later:
                </p>
                <div class="space-y-2" v-if="!reschedule.cancel">
                    <p>
                        <span class="font-bold"
                            ><span class="text-primary">Time:</span></span
                        >
                        {{ reschedule.slot.starts_at_local_time }} ({{
                            filters.format_time_zone(timezone)
                        }})
                    </p>
                    <p>
                        <span class="font-bold"
                            ><span class="text-primary">Teacher:</span></span
                        >
                        <span class="capitalize">
                            {{ reschedule.slot.teacher_name }}
                        </span>
                    </p>
                    <p>
                        <span class="font-bold"
                            ><span class="text-primary"
                                >Student Name:</span
                            ></span
                        >
                        <span class="capitalize">
                            {{ reschedule.student.full_name }}
                        </span>
                    </p>
                    <p>
                        <span class="font-bold"
                            ><span class="text-primary">Email:</span></span
                        >
                        {{ reschedule.student.email }}
                    </p>
                    <p>
                        <span class="font-bold"
                            ><span class="text-primary"
                                >Phone Number:</span
                            ></span
                        >
                        {{ reschedule.student.phone_number }}
                    </p>
                    <p>
                        <span class="font-bold"
                            ><span class="text-primary">Location:</span></span
                        >
                        {{
                            reschedule.selectedClassToReschedule.location
                                .location_name
                        }}
                    </p>
                </div>
            </section>
        </transition>
    </div>
    <loader></loader>
    <Notification></Notification>
</template>

<script>
import { useCountriesStore } from "../store/countries";
import { useFiltersStore } from "../store/filtersStore";
import { useErrorStore } from "../store/errorsStore";
import useRescheduleMixin from "../mixins/useRescheduleMixin";
import VueCal from "vue-cal";
import "vue-cal/dist/vuecal.css";
import moment from "moment";
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
                showAllTeacher: false,
            },
            phone: "",
            phoneObject: "",
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: "",
                    placeholder: "Enter phone number to fetch list of students",
                },
            },
            preferredCountries: ["US", "GB", "CA", "CN", "IN"],
            availableTaskClasses: [],
            loader: false,
            linkLoader: false,
            notification: false,
            step: 1,
            step_up: true,
            slide_animation: "",
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
    created() {
        this.countries.get();
        setTimeout(() => {
            this.showForm = true;
        }, 3500);
    },
    watch: {
        step(newVal, oldVal) {
            if (newVal > oldVal) {
                this.slide_animation = "slide-fade";
                this.step_up = true;
            } else {
                this.slide_animation = "slide-fade-reverse";
                this.step_up = false;
            }
        },
    },
    methods: {
        //
    },
};
</script>
