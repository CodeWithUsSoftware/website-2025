<template>
    <div class="px-3 md:px-0">
        <div
            id="freeform"
            class="space-y-8 bg-white shadow-card rounded-3xl md:p-10 px-10 py-10 overflow-x-hidden"
        >
            <div v-if="step < 5" class="hidden sm:flex justify-center">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol
                        role="list"
                        class="bg-white rounded-md shadow px-6 flex space-x-4"
                    >
                        <li class="flex">
                            <div class="flex items-center">
                                <a
                                    href="#freeform"
                                    @click="step = 1"
                                    class="text-gray-400 hover:text-gray-500 cursor-pointer"
                                    :class="step === 1 ? ' py-2 ' : ''"
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
                                            src="/images/trial_form/trial_logo.webp"
                                            alt=""
                                        />
                                        <span class="sr-only">Home</span>
                                    </div>
                                    <div v-else>
                                        <a
                                            @click="step = 1"
                                            href="#freeform"
                                            class="ml-4 text-sm"
                                            :class="
                                                step === 1
                                                    ? 'text-primary hover:text-primary-darker-1'
                                                    : 'text-gray-500 hover:text-gray-700'
                                            "
                                            >Class Options</a
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
                                    href="#freeform"
                                    class="ml-4 text-sm"
                                    :class="
                                        step === 2
                                            ? 'text-primary hover:text-primary-darker-1'
                                            : 'text-gray-500 hover:text-gray-700'
                                    "
                                    >School Info</a
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
                                    href="#freeform"
                                    class="ml-4 text-sm"
                                    aria-current="page"
                                    >Order Confirmation</a
                                >
                            </div>
                        </li>

                        <li
                            class="flex"
                            v-if="
                                registration.class_type === 'private' &&
                                step > 3
                            "
                        >
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
                                    href="#freeform"
                                    class="ml-4 text-sm"
                                    :class="
                                        step === 4
                                            ? 'text-primary hover:text-primary-darker-1'
                                            : 'text-gray-500 hover:text-gray-700'
                                    "
                                    >Payment</a
                                >
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <div
                v-if="step < 5"
                class="sm:hidden bg-white rounded-md shadow px-4 py-3"
            >
                <div
                    class="flex flex-col items-center justify-center space-y-2"
                >
                    <span class="text-sm font-medium text-gray-700 text-center">
                        <template v-if="step === 1">Class Options</template>
                        <template v-else-if="step === 2">School Info</template>
                        <template v-else-if="step === 3"
                            >Order Confirmation</template
                        >
                        <template
                            v-else-if="
                                step === 4 &&
                                registration.class_type === 'private'
                            "
                            >Payment</template
                        >
                    </span>

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

            <div class="md:px-36">
                <h3 class="text-center py-8" v-if="step < 4">
                    Schedule a Trial Class!
                </h3>
                <p class="text-center -mt-5" v-if="step < 4">
                    Online Trial Classes for Schools
                </p>
                <p class="text-center" v-if="step === 1">
                    Please choose your class preferences below, then click on
                    the days you are interested in on the calendar to see class
                    time and availability.
                </p>
            </div>

            <transition :name="slide_animation">
                <form
                    v-if="step === 1"
                    @submit.prevent="next"
                    class="divide-y divide-black-lighter-4"
                >
                    <div class="space-y-8 pb-20">
                        <div class="pt-2">
                            <div class="mt-6 grid grid-cols-1 gap-3 md:gap-6">
                                <div class="">
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >Topic
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <select
                                            v-model="registration.topic_id"
                                            @change="
                                                handleTopicSelection(
                                                    registration.topic_id
                                                )
                                            "
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                        >
                                            <option selected disabled value="">
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
                                            class="text-danger"
                                            v-if="error.errors.topic_id"
                                            >{{ error.errors.topic_id }}</small
                                        >
                                        <!-- <small v-if="errors && errors.topic_id" class="text-red-500">{{errors.topic_id}}</small> -->
                                    </div>
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
                                    :selected-date="
                                        registration.selected_date_raw
                                    "
                                    @cell-focus="dateClicked"
                                    :disable-days="actualDays"
                                >
                                </vue-cal>
                                <div
                                    class="space-y-1 max-h-96 overflow-y-auto px-0 md:px-10"
                                >
                                    <div
                                        class="text-primary flex flex-col items-center justify-center md:flex-row"
                                        v-if="registration.selected_date"
                                    >
                                        <div>
                                            {{
                                                filters.day_date(
                                                    registration.selected_date_raw
                                                )
                                            }}
                                        </div>
                                        <div class="md:pl-2">
                                            ({{
                                                filters.format_time_zone(
                                                    timezone
                                                )
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
                                            v-if="!available_time_slots"
                                        >
                                            <p
                                                class="text-red-500 text-center"
                                                v-html="notification"
                                            ></p>
                                        </div>
                                    </span>
                                    <div
                                        class="grid cursor-pointer gap-4"
                                        v-for="(
                                            slot, index
                                        ) in available_time_slots"
                                        :key="index"
                                        v-if="registration.selected_date"
                                        @click="selectClassHandler(slot)"
                                    >
                                        <button
                                            type="button"
                                            class="p-3 md:mx-2 rounded-xl text-center"
                                            :class="
                                                registration.slot.slot ===
                                                    slot.slot &&
                                                registration.slot.teacher.id ===
                                                    slot.teacher.id
                                                    ? 'bg-primary text-white w-full'
                                                    : 'text-info bg-info-lighter-4 w-full'
                                            "
                                        >
                                            {{ slot.slot_display }}
                                        </button>
                                        <!--                  <button type="button" class="col-span-2 p-3 mx-2 rounded-xl"-->
                                        <!--                          :class="registration.slot.slot === slot.slot && registration.slot.teacher.id === slot.teacher.id ? 'bg-primary text-white w-full' : 'text-info bg-info-lighter-4 w-full'"-->
                                        <!--                  >Teacher: {{slot.teacher.full_name}}</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10">
                        <div class="flex justify-center">
                            <button
                                type="submit"
                                :disabled="
                                    buttonLoader || !registration.slot.slot
                                "
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
                            <p class="underline">
                                <!-- <a href="mailto:info@codewithus.com" target="_blank">
                Send a custom request to the team
              </a> -->
                                <a :href="'/contact'"
                                    >Send a custom request to the team</a
                                >
                            </p>
                        </div>
                    </div>
                </form>
            </transition>

            <transition :name="slide_animation">
                <form
                    class="md:px-32"
                    v-if="step === 2"
                    @submit.prevent="submitStepTwo"
                >
                    <div class="space-y-8">
                        <div class="pt-2">
                            <div
                                class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6"
                            >
                                <div class="">
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >Number
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        >
                                    </label>
                                    <div class="mt-1">
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
                                        ></vue-tel-input>
                                        <small
                                            v-if="errors && errors.phone_number"
                                            class="text-red-500"
                                            >{{ errors.phone_number }}</small
                                        >
                                    </div>
                                </div>

                                <div class="">
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >Email
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <input
                                            required
                                            type="email"
                                            :placeholder="free_session_email"
                                            v-model="registration.parent.email"
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                        />
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <fieldset
                                        class="mt-6"
                                        v-if="existingStudents.length"
                                    >
                                        <div>
                                            <div
                                                class="text-black-lighter-2 flex"
                                            >
                                                Select a School
                                                <span
                                                    class="text-danger font-bold text-xl"
                                                    >*</span
                                                >
                                            </div>
                                            <p class="text-sm text-gray-500">
                                                Select an existing school below
                                                or add new
                                            </p>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-3 mt-4 space-y-2"
                                        >
                                            <div
                                                class="flex items-center"
                                                v-for="student in existingStudents"
                                            >
                                                <input
                                                    type="radio"
                                                    name="student"
                                                    :value="student"
                                                    v-model="
                                                        registration.student
                                                    "
                                                    class="focus:ring-primary h-4 w-4 text-primary border-gray-300"
                                                    required
                                                />
                                                <label
                                                    class="ml-3 block text-sm text-gray-700 capitalize"
                                                    >{{
                                                        student.full_name
                                                    }}</label
                                                >
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div
                                        v-if="loader"
                                        class="flex justify-center"
                                    >
                                        <!-- <Loader class="mt-10 w-20 h-203 animate-spin text-success" variants="h-10 w-10" /> -->
                                    </div>
                                </div>

                                <div
                                    class="md:col-span-2 text-info"
                                    v-if="existingStudents.length"
                                >
                                    <div
                                        class="flex items-center justify-end space-x-3"
                                    >
                                        <svg
                                            width="17"
                                            height="17"
                                            viewBox="0 0 17 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M8.48438 0.35504C8.95776 0.35504 9.34152 0.738796 9.34152 1.21218L9.34152 7.62814L15.7575 7.62814C16.2309 7.62814 16.6146 8.01189 16.6146 8.48528C16.6146 8.95867 16.2309 9.34242 15.7575 9.34242L9.34152 9.34242V15.7584C9.34152 16.2318 8.95776 16.6155 8.48438 16.6155C8.01099 16.6155 7.62723 16.2318 7.62723 15.7584V9.34242L1.21128 9.34242C0.737889 9.34242 0.354133 8.95867 0.354134 8.48528C0.354134 8.01189 0.73789 7.62814 1.21128 7.62814L7.62723 7.62814L7.62723 1.21218C7.62723 0.738796 8.01099 0.35504 8.48438 0.35504Z"
                                                fill="#4A77C4"
                                            />
                                        </svg>
                                        <p
                                            class="text-info cursor-pointer"
                                            @click="addNewStudentHandler"
                                        >
                                            Add a New School
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="md:col-span-2"
                                    v-if="registration.addNewStudent"
                                >
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >School Name
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            v-model="
                                                registration.student.full_name
                                            "
                                            required
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >Grade<span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        v-model="registration.grade"
                                        type="text"
                                        required
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                    />
                                </div>

                                <div>
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >Number of Students<span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        v-model="registration.students"
                                        type="number"
                                        min="1"
                                        required
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                    />
                                </div>

                                <div class="md:col-span-2 pt-5">
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >Special Instructions<span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <textarea
                                        rows="3"
                                        v-model="registration.notes"
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-2xl"
                                    ></textarea>
                                </div>

                                <div
                                    class="md:col-span-2 pt-5"
                                    v-if="!registration.student.id"
                                >
                                    <label
                                        class="block text-sm text-gray-700 flex"
                                        >How did you hear about us?
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <input
                                            v-model="registration.ad_source"
                                            type="text"
                                            required
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex justify-center">
                            <button
                                type="submit"
                                :disabled="
                                    buttonLoader ||
                                    !registration.student.full_name
                                "
                                class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                            >
                                <span>Next</span>
                                <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                            </button>
                        </div>
                    </div>
                </form>
            </transition>

            <transition :name="slide_animation">
                <section v-if="step === 3">
                    <form @submit.prevent="next" @reset="back">
                        <div class="space-y-10">
                            <h5 class="text-center">
                                Are you sure you want to book this class?
                            </h5>
                            <div class="md:pl-60 space-y-2">
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Class:</span
                                        ></span
                                    >
                                    {{
                                        filters.day_date(
                                            registration.selected_date_raw
                                        )
                                    }}
                                </p>
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Time:</span
                                        ></span
                                    >
                                    {{ registration.slot.slot_display }} ({{
                                        filters.format_time_zone(timezone)
                                    }})
                                </p>
                                <!--              <p><span class="font-bold"><span class="text-primary">Teacher:</span></span> <span class="capitalize">{{registration.slot.teacher.full_name}}</span> </p>-->
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Location:</span
                                        ></span
                                    >
                                    {{ registration.location.location_name }}
                                </p>
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >School Name:</span
                                        ></span
                                    >
                                    <span class="capitalize">{{
                                        registration.student.full_name
                                    }}</span>
                                </p>
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Email:</span
                                        ></span
                                    >
                                    {{ registration.parent.email }}
                                </p>
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Phone Number:</span
                                        ></span
                                    >
                                    {{ phoneObject.countryCallingCode }}
                                    {{ registration.student.phone_number }}
                                </p>
                            </div>

                            <div class="max-w-xl mx-auto">
                                <div class="flex items-center pt-5">
                                    <input
                                        required
                                        type="checkbox"
                                        name="student"
                                        class="focus:ring-primary h-4 w-4 text-primary border-gray-300 bg-gray-100 rounded"
                                    />
                                    <label
                                        class="ml-3 block text-sm text-gray-400 mt-1"
                                    >
                                        I agree to the
                                        <a
                                            :href="drive_link"
                                            class="text-primary hover:text-primary-darker-1"
                                            target="_blank"
                                            >terms of service, billing and
                                            privacy policy</a
                                        >
                                        of Code With Us
                                    </label>
                                </div>
                                <div class="flex items-center pt-1">
                                    <input
                                        required
                                        type="checkbox"
                                        name="student"
                                        class="focus:ring-primary h-4 w-4 text-primary border-gray-300 bg-gray-100 rounded"
                                    />
                                    <label
                                        class="ml-3 block text-sm text-gray-400 mt-1"
                                    >
                                        {{ technology_requirements }}
                                    </label>
                                </div>
                            </div>

                            <div class="text-center space-y-3 md:space-y-0">
                                <button
                                    :disabled="buttonLoader"
                                    type="submit"
                                    class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                                >
                                    <span>Book A Class</span>
                                    <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                                </button>
                                <button
                                    type="reset"
                                    class="shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-primary hover:bg-primary hover:text-white focus:outline-none"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </transition>

            <transition :name="slide_animation">
                <section class="text-center py-10" v-if="step === 4">
                    <h5 class="text-primary">
                        <span class="text-primary">Thank you!</span>
                    </h5>
                    <p>
                        You successfully booked a class, as per details below:
                    </p>
                    <div class="pt-10 space-y-2">
                        <p>
                            <span class="font-bold"
                                ><span class="text-primary">Class:</span></span
                            >
                            {{
                                filters.day_date(registration.selected_date_raw)
                            }}
                        </p>
                        <p>
                            <span class="font-bold"
                                ><span class="text-primary">Time:</span></span
                            >
                            {{ registration.slot.slot_display }} ({{
                                filters.format_time_zone(timezone)
                            }})
                        </p>
                        <!--          <p><span class="font-bold"><span class="text-primary">Teacher:</span></span> <span class="capitalize">{{registration.slot.teacher.full_name}}</span> </p>-->
                        <p>
                            <span class="font-bold"
                                ><span class="text-primary"
                                    >Location:</span
                                ></span
                            >
                            {{ registration.location.location_name }}
                        </p>
                        <p>
                            <span class="font-bold"
                                ><span class="text-primary"
                                    >School Name:</span
                                ></span
                            >
                            <span class="capitalize">{{
                                registration.student.full_name
                            }}</span>
                        </p>
                        <p>
                            <span class="font-bold"
                                ><span class="text-primary">Email:</span></span
                            >
                            {{ registration.parent.email }}
                        </p>
                        <p>
                            <span class="font-bold"
                                ><span class="text-primary"
                                    >Phone Number:</span
                                ></span
                            >
                            {{ phoneObject.countryCallingCode }}
                            {{ registration.student.phone_number }}
                        </p>
                        <p class="pt-10 text-primary font-extrabold">
                            <a
                                href="https://www.codewithus.com/school-program#freeform"
                                >Please click here to learn how to access your
                                trial class</a
                            >
                        </p>
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
    // referral_code: {
    //   default: false
    // },
    data() {
        return {
            //error : '',
            stripe: "",
            showAddStudentLink: false,
            slide_animation: "",
            step: 1, // step 4 is payment step
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
                    styleClasses: "",
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
            holidays_for_scheduling: JSON.parse(
                localStorage.getItem("holidays")
            ),
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
                this.slide_animation = "slide-fade";
            } else {
                this.slide_animation = "slide-fade-reverse";
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
            //   if(process.client) { window.location="#freeform" }

            if (typeof window !== "undefined") {
                window.location = "#freeform";
            }

            if (this.step === 3) {
                this.addFreeSession();
            } else {
                this.step++;
            }
        },
    },
};
</script>
