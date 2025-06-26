<template>
    <div class="px-3 md:px-0">
        <div
            id="pricing_div"
            class="space-y-8 bg-white shadow-card rounded-3xl p-10 md:px-10 overflow-x-hidden"
        >
            <div v-if="step < 5" class="hidden sm:flex justify-center">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol
                        role="list"
                        class="bg-white rounded-md shadow px-6 flex space-x-4"
                    >
                        <li class="flex p-3" v-if="step >= 0">
                            <div class="flex items-center">
                                <a
                                    @click="step = 0"
                                    href="#pricing_div"
                                    class="ml-4 text-sm"
                                    :class="
                                        step === 0
                                            ? 'text-primary hover:text-primary-darker-1'
                                            : 'text-gray-500 hover:text-gray-700'
                                    "
                                    >Class Options</a
                                >
                            </div>
                        </li>

                        <li class="flex" v-if="step > 0">
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
                                    @click="step = 1"
                                    href="#pricing_div"
                                    class="ml-4 text-sm"
                                    :class="
                                        step === 1
                                            ? 'text-primary hover:text-primary-darker-1'
                                            : 'text-gray-500 hover:text-gray-700'
                                    "
                                    >Class Schedule</a
                                >
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
                                    href="#pricing_div"
                                    class="ml-4 text-sm"
                                    :class="
                                        step === 2
                                            ? 'text-primary hover:text-primary-darker-1'
                                            : 'text-gray-500 hover:text-gray-700'
                                    "
                                    >Student Info</a
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
                                    href="#pricing_div"
                                    class="ml-4 text-sm"
                                    aria-current="page"
                                    >Order Confirmation</a
                                >
                            </div>
                        </li>

                        <li class="flex" v-if="step > 3">
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
                                    href="#pricing_div"
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
                    <!-- Current Step Title (centered) -->
                    <span class="text-sm font-medium text-gray-700 text-center">
                        <template v-if="step === 0">Class Options</template>
                        <template v-else-if="step === 1"
                            >Class Schedule</template
                        >
                        <template v-else-if="step === 2">Student Info</template>
                        <template v-else-if="step === 3"
                            >Order Confirmation</template
                        >
                        <template v-else-if="step === 4">Payment</template>
                    </span>

                    <!-- Back Button (centered below text) -->
                    <button
                        v-if="step > 0"
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

            <transition :name="slide_animation">
                <section v-if="step === 0" class="py-10 md:py-20">
                    <div class="hidden sm:flex justify-center mb-10">
                        <div
                            class="relative inline-flex bg-gray-200 rounded-full p-1"
                        >
                            <!-- Morphing slider background -->
                            <div
                                id="slider"
                                class="absolute top-0 left-0 h-full rounded-full bg-white shadow transition-all duration-300 ease-in-out"
                                :style="sliderStyle"
                                style="z-index: 0"
                            ></div>

                            <button
                                v-for="plan in plans"
                                :key="plan.value"
                                @click="switchPlan(plan.value, $event)"
                                :id="'tab-' + plan.value"
                                :data-plan="plan.value"
                                ref="planTabs"
                                class="plan-tab relative z-10 px-6 py-2 text-sm font-medium rounded-full text-gray-700 flex items-center space-x-2 transition-colors duration-200"
                            >
                                <span>{{ plan.label }}</span>
                                <span
                                    class="ml-2 bg-blue-600 text-white text-xs font-semibold px-2 py-0.5 rounded-full"
                                >
                                    {{ plan.discount }} off
                                </span>
                            </button>
                        </div>
                    </div>

                    <form @submit.prevent="step++">
                        <div
                            class="grid grid-cols-1 md:grid-cols-12 sm:grid-cols-12 gap-12"
                        >
                            <div class="col-span-6">
                                <div>
                                    <div class="text-center mb-5">
                                        <h6 class="text-xl">
                                            Select Your
                                            <span
                                                v-if="
                                                    registration.billing_cycle ===
                                                    1
                                                "
                                                >Monthly</span
                                            >
                                            <span
                                                v-else-if="
                                                    registration.billing_cycle ===
                                                    3
                                                "
                                                >Quarterly</span
                                            >
                                            <span
                                                v-else-if="
                                                    registration.billing_cycle ===
                                                    6
                                                "
                                                >Semi Annual</span
                                            >
                                            Plan Preferences
                                        </h6>
                                        <h6
                                            v-if="
                                                registration.billing_cycle === 1
                                            "
                                        >
                                            No Contracts. Month to Month. Cancel
                                            Anytime.
                                        </h6>
                                        <h6 v-else>
                                            No Contracts. Cancel Anytime Before
                                            Renewal.
                                        </h6>
                                    </div>
                                    <div
                                        class="flex justify-center mt-5 space-y-3"
                                    >
                                        <div class="flex relative">
                                            <div
                                                class="bg-white hidden md:inline-block py-2 min-h-full w-20 md:w-16 transform rotate-45 translate-y-2 md:translate-y-0 -mr-5 z-20"
                                            ></div>
                                            <div
                                                class="bg-yellow-400 inline-block p-4 px-8 md:px-14 z-10 text-center"
                                            >
                                                <h6 class="font-extrabold">
                                                    Limited Time :
                                                    <span
                                                        v-if="
                                                            registration.billing_cycle ===
                                                            1
                                                        "
                                                        >{{
                                                            "$" +
                                                            discounted_price
                                                        }}</span
                                                    >
                                                    <span
                                                        v-if="
                                                            registration.billing_cycle ===
                                                            3
                                                        "
                                                        >{{
                                                            "$" +
                                                            discounted_price
                                                        }}</span
                                                    >
                                                    <span
                                                        v-if="
                                                            registration.billing_cycle ===
                                                            6
                                                        "
                                                        >{{
                                                            "$" +
                                                            discounted_price
                                                        }}</span
                                                    >
                                                    off on Classes
                                                </h6>
                                            </div>
                                            <div
                                                class="bg-white hidden md:inline-block p-2 min-h-full w-20 md:w-16 transform rotate-45 -translate-y-2 md:-translate-y-0 -ml-5 z-10"
                                            ></div>
                                        </div>
                                    </div>
                                    <hr class="mt-3" />
                                    <div class="px-4">
                                        <div class="pt-5">
                                            <h6 class="font-bold text-sm flex">
                                                Choose the location for the
                                                coding classes
                                                <span
                                                    class="text-danger font-bold text-xl"
                                                    >*</span
                                                >
                                            </h6>
                                            <div class="mt-1">
                                                <select
                                                    required
                                                    v-model="
                                                        registration.location_id
                                                    "
                                                    @change="
                                                        handleLocationSelection(
                                                            registration.location_id
                                                        )
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.location_id
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                                >
                                                    <option
                                                        selected
                                                        disabled
                                                        value=""
                                                    >
                                                        Select Location
                                                    </option>
                                                    <option
                                                        v-for="location in locations.locations"
                                                        :key="location.id"
                                                        :value="location.id"
                                                    >
                                                        {{
                                                            location.location_name
                                                        }}
                                                    </option>
                                                </select>
                                                <small
                                                    v-if="
                                                        errors &&
                                                        errors.location_id
                                                    "
                                                    class="text-red-500"
                                                    >{{
                                                        errors.location_id
                                                    }}</small
                                                >
                                            </div>
                                        </div>

                                        <div class="space-y-3 mt-3 mb-3">
                                            <h6 class="font-bold text-sm flex">
                                                Choose the coding topic for the
                                                classes<span
                                                    class="text-danger font-bold text-xl"
                                                    >*</span
                                                >
                                            </h6>
                                            <div class="mt-1">
                                                <select
                                                    required
                                                    v-model="
                                                        registration.topic_id
                                                    "
                                                    @change="
                                                        handleTopicSelection(
                                                            registration.topic_id
                                                        )
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.topic_id
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                                >
                                                    <option
                                                        selected
                                                        disabled
                                                        value=""
                                                    >
                                                        Select Topic
                                                    </option>
                                                    <option
                                                        v-for="topic in topics.topics"
                                                        :key="topic.id"
                                                        :value="topic.id"
                                                    >
                                                        {{ topic.name }}
                                                    </option>
                                                </select>
                                                <small
                                                    v-if="
                                                        errors &&
                                                        errors.topic_id
                                                    "
                                                    class="text-red-500"
                                                    >{{
                                                        errors.topic_id
                                                    }}</small
                                                >
                                            </div>
                                        </div>
                                        <div class="space-y-3 mt-3 mb-3">
                                            <h6 class="font-bold text-sm flex">
                                                Choose the timeslot ({{
                                                    filters.format_time_zone(
                                                        timezone
                                                    )
                                                }})<span
                                                    class="text-danger font-bold text-xl"
                                                    >*</span
                                                >
                                            </h6>
                                            <div class="mt-1">
                                                <select
                                                    required
                                                    v-model="
                                                        registration.timeslot_duration
                                                    "
                                                    @change="
                                                        handleTopicSelection(
                                                            registration.topic_id
                                                        )
                                                    "
                                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                                >
                                                    <option
                                                        selected
                                                        disabled
                                                        value=""
                                                    >
                                                        Select Timeslot Duration
                                                    </option>
                                                    <option value="morning">
                                                        Morning - (8 am -12 pm)
                                                    </option>
                                                    <option value="afternoon">
                                                        Afternoon - (12 pm - 4
                                                        pm)
                                                    </option>
                                                    <option value="evening">
                                                        Evening (4 pm - 9 pm)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="space-y-3 mb-4">
                                            <h6 class="font-bold text-sm">
                                                Choose the class size
                                            </h6>
                                            <div class="flex px-2 space-x-2">
                                                <input
                                                    required
                                                    value="Small Group"
                                                    :checked="
                                                        registration.class_type ===
                                                        'Small Group'
                                                    "
                                                    type="radio"
                                                    v-model="
                                                        registration.class_type
                                                    "
                                                    @change="
                                                        handleClassTypeChange
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.class_type
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5 sm:text-sm border-gray-300 bg-white"
                                                />
                                                <label
                                                    class="text-black-lighter-2 text-sm"
                                                    >Small Group (3 to 1)</label
                                                >
                                            </div>
                                            <div class="flex px-2 space-x-2">
                                                <input
                                                    required
                                                    value="Private"
                                                    :checked="
                                                        registration.class_type ===
                                                        'Private'
                                                    "
                                                    type="radio"
                                                    v-model="
                                                        registration.class_type
                                                    "
                                                    @change="
                                                        handleClassTypeChange
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.class_type
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5 sm:text-sm border-gray-300 bg-white"
                                                />
                                                <label
                                                    class="text-black-lighter-2 text-sm"
                                                    >Private (1 to 1)</label
                                                >
                                            </div>
                                            <small
                                                v-if="
                                                    errors && errors.class_type
                                                "
                                                class="text-red-500"
                                                >{{ errors.class_type }}</small
                                            >
                                        </div>

                                        <div class="space-y-3 mb-4">
                                            <h6 class="font-bold text-sm">
                                                Choose the class frequency
                                            </h6>
                                            <div class="flex px-2 space-x-2">
                                                <input
                                                    required
                                                    type="radio"
                                                    :value="parseInt(1)"
                                                    :checked="
                                                        registration.class_per_week ===
                                                        1
                                                    "
                                                    v-model="
                                                        registration.class_per_week
                                                    "
                                                    @click="
                                                        handleClassPerWeekChange
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.class_per_week
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5 sm:text-sm border-gray-300 bg-white"
                                                />
                                                <label
                                                    class="text-black-lighter-2 text-sm"
                                                    >1 class / week</label
                                                >
                                            </div>
                                            <div class="flex px-2 space-x-2">
                                                <input
                                                    required
                                                    type="radio"
                                                    :value="parseInt(2)"
                                                    :checked="
                                                        registration.class_per_week ===
                                                        2
                                                    "
                                                    v-model="
                                                        registration.class_per_week
                                                    "
                                                    @click="
                                                        handleClassPerWeekChange
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.class_per_week
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5 sm:text-sm border-gray-300 bg-white"
                                                />
                                                <label
                                                    class="text-black-lighter-2 text-sm"
                                                    >2 classes / week</label
                                                >
                                            </div>
                                            <small
                                                v-if="
                                                    errors &&
                                                    errors.class_per_week
                                                "
                                                class="text-red-500"
                                                >{{
                                                    errors.class_per_week
                                                }}</small
                                            >
                                        </div>

                                        <div class="space-y-3 mb-4 sm:hidden">
                                            <h6 class="font-bold text-sm">
                                                Choose your payment schedule
                                            </h6>
                                            <div class="flex px-2 space-x-2">
                                                <input
                                                    required
                                                    type="radio"
                                                    :value="parseInt(1)"
                                                    :checked="
                                                        registration.billing_cycle ===
                                                        1
                                                    "
                                                    v-model="
                                                        registration.billing_cycle
                                                    "
                                                    @change="
                                                        handleBillingCycleChange
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.class_per_week
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5 sm:text-sm border-gray-300 bg-white"
                                                />
                                                <label
                                                    class="text-black-lighter-2 text-sm"
                                                    >Monthly (20% off
                                                    Classes)</label
                                                >
                                            </div>
                                            <div class="flex px-2 space-x-2">
                                                <input
                                                    required
                                                    type="radio"
                                                    :value="parseInt(3)"
                                                    :checked="
                                                        registration.billing_cycle ===
                                                        3
                                                    "
                                                    v-model="
                                                        registration.billing_cycle
                                                    "
                                                    @change="
                                                        handleBillingCycleChange
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.class_per_week
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5 sm:text-sm border-gray-300 bg-white"
                                                />
                                                <label
                                                    class="text-black-lighter-2 text-sm"
                                                    >Quarterly (30% off
                                                    Classes)</label
                                                >
                                            </div>
                                            <div class="flex px-2 space-x-2">
                                                <input
                                                    required
                                                    type="radio"
                                                    :value="parseInt(6)"
                                                    :checked="
                                                        registration.billing_cycle ===
                                                        6
                                                    "
                                                    v-model="
                                                        registration.billing_cycle
                                                    "
                                                    @change="
                                                        handleBillingCycleChange
                                                    "
                                                    :class="
                                                        errors &&
                                                        errors.class_per_week
                                                            ? 'border-red-500'
                                                            : ''
                                                    "
                                                    class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5 sm:text-sm border-gray-300 bg-white"
                                                />
                                                <label
                                                    class="text-black-lighter-2 text-sm"
                                                    >Semi Annual (35% off
                                                    Classes)</label
                                                >
                                            </div>
                                            <small
                                                v-if="
                                                    errors &&
                                                    errors.class_per_week
                                                "
                                                class="text-red-500"
                                                >{{
                                                    errors.class_per_week
                                                }}</small
                                            >
                                        </div>

                                        <!-- <div class="flex flex-col space-y-3 mb-4">
                            <h6 class="font-bold text-sm">Choose your payment schedule</h6>
                            <div class="flex px-2 space-x-2">
                                <input required type="radio" :value="parseInt(1)" :checked="registration.billing_cycle === 1" v-model="registration.billing_cycle" @change="handleBillingCycleChange" :class="errors && errors.class_per_week ? 'border-red-500' : ''" class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5  sm:text-sm border-gray-300 bg-white ">
                                <label class="text-black-lighter-2 text-sm">Monthly (20% off Classes)</label>
                            </div>
                            <div class="flex px-2 space-x-2">
                                <input required type="radio" :value="parseInt(3)" :checked="registration.billing_cycle === 3" v-model="registration.billing_cycle" @change="handleBillingCycleChange" :class="errors && errors.class_per_week ? 'border-red-500' : ''" class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5  sm:text-sm border-gray-300 bg-white ">
                                <label class="text-black-lighter-2 text-sm">Quarterly (30% off Classes)</label>
                            </div>
                            <div class="flex px-2 space-x-2">
                                <input required type="radio" :value="parseInt(6)" :checked="registration.billing_cycle === 6" v-model="registration.billing_cycle" @change="handleBillingCycleChange" :class="errors && errors.class_per_week ? 'border-red-500' : ''" class="shadow-sm focus:ring-camps focus:border-camps block w-5 h-5  sm:text-sm border-gray-300 bg-white ">
                                <label class="text-black-lighter-2 text-sm">Semi Annual (35% off Classes)</label>
                            </div>
                            <small v-if="errors && errors.class_per_week" class="text-red-500">{{errors.class_per_week}}</small>
                          </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div
                                    class="bg-gradient-to-t p-[10px] from-primary to-success rounded-lg h-full"
                                >
                                    <div class="p-4 bg-white rounded-lg h-full">
                                        <div
                                            class="h-full flex flex-col overflow-hidden lg:rounded-none lg:rounded-l-2xl"
                                        >
                                            <div class="flex-1 flex flex-col">
                                                <div class="text-center">
                                                    <h5>
                                                        <span
                                                            v-if="
                                                                registration.billing_cycle ===
                                                                1
                                                            "
                                                            >Monthly</span
                                                        >
                                                        <span
                                                            v-else-if="
                                                                registration.billing_cycle ===
                                                                3
                                                            "
                                                            >Quarterly</span
                                                        >
                                                        <span
                                                            v-else-if="
                                                                registration.billing_cycle ===
                                                                6
                                                            "
                                                            >Semi Annual</span
                                                        >
                                                        Subscription Cost
                                                    </h5>
                                                    <div
                                                        class="flex flex-col justify-center md:flex-row items-center md:space-x-6 mt-1"
                                                    >
                                                        <h3
                                                            class="text-2xl relative"
                                                        >
                                                            {{
                                                                "$" +
                                                                Math.ceil(
                                                                    total_amount /
                                                                        0.8
                                                                )
                                                            }}
                                                            <span
                                                                class="absolute right-0 border border-danger left-0 top-8"
                                                            ></span>
                                                        </h3>
                                                        <h1
                                                            class="md:text-5xl font-extrabold text-primary"
                                                        >
                                                            {{
                                                                "$" +
                                                                total_amount
                                                            }}
                                                        </h1>
                                                    </div>
                                                    <br />
                                                    <span
                                                        class="text-sm"
                                                        v-if="
                                                            registration.billing_cycle ===
                                                            1
                                                        "
                                                        >({{
                                                            "$" +
                                                            discounted_price
                                                        }}
                                                        Discount is already
                                                        included in price
                                                        above)</span
                                                    >
                                                    <span
                                                        class="text-sm"
                                                        v-if="
                                                            registration.billing_cycle ===
                                                            3
                                                        "
                                                        >({{
                                                            "$" +
                                                            discounted_price
                                                        }}
                                                        Discount is already
                                                        included in price
                                                        above)</span
                                                    >
                                                    <span
                                                        class="text-sm"
                                                        v-if="
                                                            registration.billing_cycle ===
                                                            6
                                                        "
                                                        >({{
                                                            "$" +
                                                            discounted_price
                                                        }}
                                                        Discount is already
                                                        included in price
                                                        above)</span
                                                    >
                                                </div>
                                                <div class="text-center">
                                                    <h5 class="underline">
                                                        Your Subscription
                                                        Details
                                                    </h5>
                                                </div>
                                                <div
                                                    class="flex-1 flex flex-col justify-between p-6 bg-white sm:p-10 lg:p-6 xl:p-10"
                                                >
                                                    <ul
                                                        role="list"
                                                        class="space-y-4"
                                                    >
                                                        <li
                                                            class="flex items-start"
                                                        >
                                                            <p
                                                                class="ml-3 text-base font-medium text-gray-500"
                                                            >
                                                                <span
                                                                    class="font-bold text-primary"
                                                                    >Location:
                                                                </span>
                                                                <span
                                                                    v-if="
                                                                        registration.location_id
                                                                    "
                                                                    >{{
                                                                        registration
                                                                            .location
                                                                            .location_name
                                                                    }}</span
                                                                >
                                                                <span
                                                                    v-else
                                                                    class="border-b-2"
                                                                    >&emsp;&emsp;&emsp;&emsp;&emsp;</span
                                                                >
                                                            </p>
                                                        </li>

                                                        <li
                                                            class="flex items-start"
                                                        >
                                                            <p
                                                                class="ml-3 text-base font-medium text-gray-500"
                                                            >
                                                                <span
                                                                    class="font-bold text-primary"
                                                                    >Topic:
                                                                </span>
                                                                <span
                                                                    v-if="
                                                                        registration.topic_id
                                                                    "
                                                                    >{{
                                                                        registration
                                                                            .topic
                                                                            .name
                                                                    }}</span
                                                                >
                                                                <span
                                                                    v-else
                                                                    class="border-b-2"
                                                                    >&emsp;&emsp;&emsp;&emsp;&emsp;</span
                                                                >
                                                            </p>
                                                        </li>
                                                        <li
                                                            class="flex items-start"
                                                        >
                                                            <p
                                                                class="ml-3 text-base font-medium text-gray-500"
                                                            >
                                                                <span
                                                                    class="font-bold text-primary"
                                                                    >Timeslot
                                                                    Duration:
                                                                </span>
                                                                <span
                                                                    v-if="
                                                                        registration.timeslot_duration
                                                                    "
                                                                >
                                                                    <span
                                                                        v-if="
                                                                            registration.timeslot_duration ===
                                                                            'morning'
                                                                        "
                                                                        >Morning
                                                                        - (8 am
                                                                        - 12
                                                                        pm)</span
                                                                    >
                                                                    <span
                                                                        v-else-if="
                                                                            registration.timeslot_duration ===
                                                                            'afternoon'
                                                                        "
                                                                        >Afternoon
                                                                        - (12 pm
                                                                        - 4
                                                                        pm)</span
                                                                    >
                                                                    <span
                                                                        v-else-if="
                                                                            registration.timeslot_duration ===
                                                                            'evening'
                                                                        "
                                                                        >Evening
                                                                        - (4 pm
                                                                        - 9
                                                                        pm)</span
                                                                    >
                                                                </span>
                                                                <span
                                                                    v-else
                                                                    class="border-b-2"
                                                                    >&emsp;&emsp;&emsp;&emsp;&emsp;</span
                                                                >
                                                            </p>
                                                        </li>
                                                        <li
                                                            class="flex items-start"
                                                        >
                                                            <p
                                                                class="ml-3 text-base font-medium text-gray-500"
                                                            >
                                                                <span
                                                                    class="font-bold text-primary"
                                                                    >Class Size:
                                                                </span>
                                                                <span>{{
                                                                    registration.class_type ===
                                                                    "Small Group"
                                                                        ? "Small Group"
                                                                        : "Private"
                                                                }}</span>
                                                            </p>
                                                        </li>
                                                        <li
                                                            class="flex items-start"
                                                        >
                                                            <p
                                                                class="ml-3 text-base font-medium text-gray-500"
                                                            >
                                                                <span
                                                                    class="font-bold text-primary"
                                                                    >Class
                                                                    Frequency:
                                                                </span>
                                                                <span>{{
                                                                    registration.class_per_week ===
                                                                    1
                                                                        ? "One per week"
                                                                        : "Two per week"
                                                                }}</span>
                                                            </p>
                                                        </li>
                                                        <li
                                                            class="flex items-start"
                                                        >
                                                            <p
                                                                class="ml-3 text-base font-medium text-gray-500"
                                                            >
                                                                <span
                                                                    class="font-bold text-primary"
                                                                    >Payment
                                                                    Schedule:
                                                                </span>
                                                                <span
                                                                    v-if="
                                                                        registration.billing_cycle ===
                                                                        1
                                                                    "
                                                                    >Monthly</span
                                                                >
                                                                <span
                                                                    v-else-if="
                                                                        registration.billing_cycle ===
                                                                        3
                                                                    "
                                                                    >Quarterly</span
                                                                >
                                                                <span
                                                                    v-else-if="
                                                                        registration.billing_cycle ===
                                                                        6
                                                                    "
                                                                    >Semi
                                                                    Annual</span
                                                                >
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-24">
                                <div class="text-center">
                                    <button
                                        type="submit"
                                        class="shadow-primary w-full md:w-max px-8 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none"
                                    >
                                        <span class="text-xl">Continue</span>
                                        <br />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </transition>

            <transition :name="slide_animation">
                <form
                    v-if="step === 1"
                    @submit.prevent="submitStepOne"
                    class="divide-y divide-black-lighter-4"
                >
                    <div class="space-y-8 pb-5">
                        <div class="pt-2">
                            <div v-if="step === 1" class="mt-5">
                                <h4 class="text-center">
                                    Select Your Preferred Class Schedule:
                                </h4>
                            </div>

                            <div
                                class="mt-5 text-center"
                                v-if="!allSlotsSelected"
                            >
                                <p class="text-red-500">
                                    <span class="font-extrabold text-black"
                                        >Select your class start date: </span
                                    >Please select
                                    {{
                                        this.registration.class_per_week === 1
                                            ? "one class"
                                            : "two classes"
                                    }}
                                    for the next step!
                                </p>
                            </div>

                            <div class="space-y-3 mt-3 mb-3">
                                <h6 class="font-bold text-sm flex">
                                    Choose the timeslot Duration<span
                                        class="text-danger font-bold text-xl"
                                        >*</span
                                    >
                                </h6>
                                <div class="mt-1">
                                    <select
                                        required
                                        v-model="registration.timeslot_duration"
                                        @change="
                                            handleTopicSelection(
                                                registration.topic_id
                                            )
                                        "
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                    >
                                        <option selected disabled value="">
                                            Select Timeslot Duration
                                        </option>
                                        <option value="morning">
                                            Morning - (8 am -12 pm)
                                        </option>
                                        <option value="afternoon">
                                            Afternoon - (12 pm - 4 pm)
                                        </option>
                                        <option value="evening">
                                            Evening (4 pm - 9 pm)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div
                                class="mt-6 grid grid-cols-1 md:grid-cols-2 md:gap-2"
                            >
                                <vue-cal
                                    @view-change="ready"
                                    @ready="ready"
                                    style="height: 350px"
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
                                        class="grid grid-cols-3 gap-1 md:gap-4 text-center text-primary"
                                        v-if="
                                            available_time_slots &&
                                            available_time_slots.length > 0
                                        "
                                    >
                                        <span class="p-1 md:p-3 md:mx-2"
                                            >Time</span
                                        >
                                        <span
                                            class="col-span-2 p-1 md:p-3 md:mx-2"
                                            >Teacher</span
                                        >
                                    </div>

                                    <div
                                        class="grid grid-cols-3 cursor-pointer gap-1 md:gap-4"
                                        v-for="(
                                            slot, index
                                        ) in available_time_slots"
                                        :key="index"
                                        v-if="registration.selected_date"
                                        @click="selectClassHandler(slot)"
                                    >
                                        <div
                                            class="text-info bg-info-lighter-4 p-1 md:p-3 md:mx-2 rounded-xl text-center focus:bg-primary focus:text-white w-full"
                                        >
                                            {{ slot.slot_display }}
                                        </div>
                                        <div
                                            class="col-span-2 text-info bg-info-lighter-4 p-1 md:p-3 md:mx-2 rounded-xl text-center focus:bg-primary focus:text-white capitalize w-full"
                                        >
                                            {{ slot.teacher.full_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mt-6 grid grid-cols-1 md:grid-cols-2 md:gap-2"
                            >
                                <div
                                    v-for="(
                                        slot, index
                                    ) in registration.selectedTaskClasses"
                                    :key="index"
                                >
                                    <div
                                        class="flex items-center px-0 md:px-10"
                                    >
                                        <div
                                            class="w-full m-1 cursor-pointer space-y-2 md:space-y-0 md:space-x-2 inline-flex items-center justify-center px-2 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                                        >
                                            <span
                                                >{{
                                                    filters.date_format(
                                                        slot.date
                                                    )
                                                }},
                                                {{ slot.slot_display }}</span
                                            >
                                        </div>
                                        <div title="Remove selected class">
                                            <svg
                                                @click="deleteSlot(slot)"
                                                class="w-6 h-6 text-red-500 cursor-pointer"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10">
                        <div class="flex justify-center">
                            <button
                                type="submit"
                                :disabled="buttonLoader || !allSlotsSelected"
                                class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                            >
                                <span>Next</span>
                            </button>
                        </div>

                        <div
                            class="flex md:flex-col items-center justify-center space-x-3 py-3 pt-10 text-sm"
                        >
                            <p>Don’t see something that fits your schedule?</p>
                            <p class="underline">
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
                    class="md:px-36"
                    v-if="step === 2"
                    @submit.prevent="submitStepTwo"
                >
                    <div class="space-y-8">
                        <div class="pt-2">
                            <div
                                class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6"
                            >
                                <div class="">
                                    <label class="text-sm text-gray-700 flex"
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
                                    <label class="text-sm text-gray-700 flex"
                                        >Email
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <input
                                            required
                                            v-model="registration.parent.email"
                                            placeholder="Email"
                                            type="email"
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                        />
                                    </div>
                                </div>

                                <!-- <div class="md:col-span-2 pt-5 hidden" >
                    <label class="text-sm text-gray-700 flex">Parent Name <span class="text-danger font-bold text-xl">*</span></label>
                    <div class="mt-1">
                      <input
                        placeholder="Parent Name"
                        v-model="registration.parent.full_name"
                        type="text"
                        required
                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                      >
                    </div>
                  </div> -->

                                <div class="md:col-span-2">
                                    <fieldset
                                        class="mt-6"
                                        v-if="existingStudents.length"
                                    >
                                        <div>
                                            <div
                                                class="text-black-lighter-2 flex"
                                            >
                                                Select a Student
                                                <span
                                                    class="text-danger font-bold text-xl"
                                                    >*</span
                                                >
                                            </div>
                                            <p class="text-sm text-gray-500">
                                                Select an existing student below
                                                or add new
                                            </p>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-3 mt-4 space-y-2"
                                        >
                                            <div
                                                class="flex items-center"
                                                v-for="student in existingStudents"
                                                :key="student.id"
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
                                            Add a New Student
                                        </p>
                                    </div>
                                </div>
                                <div class="" v-if="registration.addNewStudent">
                                    <label class="text-sm text-gray-700 flex"
                                        >Student Name
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            placeholder="Student Name"
                                            v-model="
                                                registration.student.full_name
                                            "
                                            required
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                        />
                                    </div>
                                </div>

                                <div class="" v-if="registration.addNewStudent">
                                    <label class="text-sm text-gray-700 flex"
                                        >Age
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="number"
                                            placeholder="Age"
                                            v-model="registration.student.age"
                                            required
                                            class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full"
                                        />
                                    </div>
                                </div>

                                <div
                                    class="md:col-span-2 pt-5"
                                    v-if="!registration.student.id"
                                >
                                    <label class="text-sm text-gray-700 flex"
                                        >How did you hear about us?
                                        <span
                                            class="text-danger font-bold text-xl"
                                            >*</span
                                        ></label
                                    >
                                    <div class="mt-1">
                                        <input
                                            placeholder="How did you hear about us?"
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
                    <div class="pt-1">
                        <div class="flex justify-center">
                            <button
                                type="submit"
                                :disabled="buttonLoader"
                                class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary w-full md:w-max px-20 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                            >
                                <span>Next</span>
                            </button>
                        </div>
                    </div>
                </form>
            </transition>

            <transition :name="slide_animation">
                <section v-if="step === 3">
                    <div class="space-y-20">
                        <h5 class="text-center">
                            {{
                                registration.class_per_week === 1
                                    ? "Are you sure you want to book this class?"
                                    : "Are you sure you want to book these classes?"
                            }}
                        </h5>
                        <div class="md:pl-72 space-y-2">
                            <p>
                                <span class="font-bold"
                                    >Classes Selected ({{
                                        filters.format_time_zone(timezone)
                                    }}) :</span
                                >
                            </p>
                            <div class="p-1 py-2 my-2">
                                <div
                                    v-for="(
                                        slot, index
                                    ) in registration.selectedTaskClasses"
                                    class="pb-2"
                                    :key="index"
                                >
                                    <!-- <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Class - </span
                                            >{{ index + 1 }}</span
                                        >
                                    </p> -->
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Class {{ index + 1 }} Schedule
                                                :</span
                                            ></span
                                        >
                                        {{ filters.to_day(slot.date) }},
                                        {{ slot.slot_display }} ({{
                                            filters.format_time_zone(timezone)
                                        }})
                                    </p>
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Teacher:</span
                                            ></span
                                        >
                                        <span class="capitalize">{{
                                            slot.teacher.full_name
                                        }}</span>
                                    </p>
                                    <!-- <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Class:</span
                                            ></span
                                        >
                                        {{ filters.day_date(slot.date) }}
                                    </p>
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Time:</span
                                            ></span
                                        >
                                        {{ slot.slot_display }}
                                    </p> -->
                                    <p>
                                        <span class="font-bold"
                                            ><span class="text-primary"
                                                >Status:</span
                                            ></span
                                        >
                                        Recurring weekly
                                    </p>
                                </div>
                            </div>
                            <p>
                                <span class="font-bold"
                                    ><span class="text-primary"
                                        >Amount:</span
                                    ></span
                                >
                                ${{ total_amount }}
                            </p>
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
                                        >Student Name:</span
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
                                {{ registration.parent.phone_number }}
                            </p>
                        </div>

                        <div
                            class="flex items-center justify-center text-center pt-20"
                        >
                            <input
                                required
                                type="checkbox"
                                v-model="tc"
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
                                    >terms of service, billing and privacy
                                    policy</a
                                >
                                of Code With Us
                            </label>
                        </div>
                        <div class="text-center space-y-2">
                            <button
                                @click="redirectToCheckout"
                                :disabled="!tc"
                                type="button"
                                :class="
                                    !tc
                                        ? 'disabled:opacity-50 disabled:cursor-not-allowed'
                                        : ''
                                "
                                class="w-full md:w-52 shadow-primary inline-flex items-center justify-center px-10 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                            >
                                <span>Book Class</span>
                                <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
                            </button>
                            <button
                                @click="back"
                                type="button"
                                class="w-full md:w-52 shadow-primary inline-flex items-center justify-center px-10 py-2 text-sm border border-primary rounded-full text-primary hover:bg-primary hover:text-white focus:outline-none"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </section>
            </transition>

            <transition :name="slide_animation">
                <section class="py-10" v-show="step === 4">
                    <div id="checkout"></div>
                    <!-- <form @submit.p.prevent="submit"> -->
                    <!-- <div class="max-w-2xl mx-auto flex flex-col justify-center space-y-16 divide-y">
                  <div class="flex justify-between">
                  <h6 class="font-bold uppercase">
                    <span v-if="registration.billing_cycle === 1">Monthly</span>
                    <span v-else-if="registration.billing_cycle === 3">Quarterly</span>
                    <span v-else-if="registration.billing_cycle === 6">Semi Annual</span>
                    SUBSCRIPTION : {{registration.class_type}} / {{ classPerWeekText }}</h6>
                  <h6>${{total_amount}}/
                    <span v-if="registration.billing_cycle === 1">Month</span>
                    <span v-else-if="registration.billing_cycle === 3">Quarter</span>
                    <span v-else-if="registration.billing_cycle === 6">Semi Annual</span>
                  </h6>
                </div>
                <div class="pt-10">
                  <div>Enter Card Number</div>
                  <div id="card-element" class="MyCardElement" >

                  </div>
                  <p v-if="error" class="capitalize text-danger">Error : {{error}}</p>
                    <div class="flex md:justify-between items-center">
                      <div>
                        <h6 class="">Voucher Code</h6>
                        <span v-if="coupon.id && !coupon.isValid" class="bg-success text-white rounded-full p-1 px-2 cursor-pointer"  @click="applyCoupon">Apply</span>
                        <span v-if="coupon.id" class="bg-red-500 text-white rounded-full p-1 px-2 cursor-pointer" @click="resetCoupon">Reset</span>
                        <span class="pt-2">
                            <small v-if="coupon.isValid" class="text-success">Voucher Applied!</small>
                            <small v-if="coupon.coupon_error" class="text-danger">{{coupon.coupon_error}}</small>
                            <span v-if="coupon.loader" role="status" aria-hidden="true">Applying Coupon</span>
                        </span>
                      </div>
                      <input v-model="coupon.id" type="text" class="px-2 py-2.5 my-2 shadow-sm focus:ring-0 focus:border-transparent block w-2/6 text-sm border-gray-100 bg-gray-100 rounded-full">
                    </div>
                </div>

                <div class="flex justify-between pt-2">
                  <h6 class="font-bold">Total Amount</h6>
                  <h6 class="font-bold text-primary">${{total_amount}}</h6>
                </div>
              </div> -->
                    <!--
              <div class="flex items-center justify-center text-center pt-20">
                <input required type="checkbox" name="student" class="focus:ring-primary h-4 w-4 text-primary border-gray-300 bg-gray-100 rounded">
                <label class="ml-3 block text-sm text-gray-400 mt-1">
                  I agree to the
                  <a href="https://drive.google.com/file/d/1cXqyByjGJUZExCLstdohyAUeOGQOxd7m/view" class="text-primary hover:text-primary-darker-1" target="_blank">terms of service, billing and privacy policy</a>
                  of Code With Us
                </label>
              </div> -->

                    <!-- <div class="text-center pt-20">
                <button type="submit" :disabled="buttonLoader" class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary space-x-2 inline-flex items-center px-20 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">
                  <span>Pay Now</span>
                </button>
              </div> -->
                    <!-- </form> -->
                </section>
            </transition>

            <transition :name="slide_animation">
                <section class="text-center py-0" v-if="step === 5">
                    <div class="pb-10">
                        <h5 class="text-primary">Thank you!</h5>
                        <p>You successfully booked a class!</p>
                    </div>
                    <div class="space-y-2">
                        <p>
                            <span class="font-bold"
                                >Classes Selected ({{
                                    filters.format_time_zone(timezone)
                                }}) :</span
                            >
                        </p>
                        <div class="p-1 py-2 my-2">
                            <div
                                v-for="(
                                    slot, index
                                ) in registration.selectedTaskClasses"
                                class="pb-2"
                                :key="index"
                            >
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Teacher:</span
                                        ></span
                                    >
                                    <span class="capitalize">{{
                                        slot.teacher.full_name
                                    }}</span>
                                </p>
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Class:</span
                                        ></span
                                    >
                                    {{ filters.day_date(slot.date) }}
                                </p>
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Time:</span
                                        ></span
                                    >
                                    {{ slot.slot_display }}, ({{
                                        filters.format_time_zone(timezone)
                                    }})
                                </p>
                                <p>
                                    <span class="font-bold"
                                        ><span class="text-primary"
                                            >Status:</span
                                        ></span
                                    >
                                    Recurring weekly
                                </p>
                            </div>
                        </div>
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
                                    >Student Name:</span
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
                            {{ registration.parent.phone_number }}
                        </p>
                        <p class="pt-10 text-primary font-extrabold">
                            <a href="/how-to-videos" target="_blank"
                                >Please click here to learn how to access your
                                weekly class</a
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
import VueCal from "vue-cal";
import "vue-cal/dist/vuecal.css";
import recaptcha from "../../../mixins/recaptcha";
import partner_code_cookie from "../../../mixins/partner_code_cookie";
import useMonthlySubscriptionMixin from "../mixins/useMonthlySubscriptionMixin";
import { useNotificationStore } from "../store/notificationStore";
import moment from "moment";
import { useStudentsStore } from "../store/studentsStore";

// let stripe = Stripe(
//     "pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69"
// );
//let stripe = Stripe("pk_test_516dVSfF9uOieGMSt1f9SDZ684fKcYd7hocVBUMs4yyJbikYit4S3GKus0Jw8QYfYzyNOimuPDoLBPq1KgVkSkzW900USvWxqzE");

export default {
    props: [
        "private_classes_discount_price",
        "group_classes_discount_price",
        "drive_link",
    ],
    mixins: [partner_code_cookie, recaptcha, useMonthlySubscriptionMixin],
    components: { VueCal },
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
            error: "",
            tc: false,
            checkout: null,
            coupon: {
                id: "",
                isValid: false,
                coupon_error: "",
                amount_off: 0,
                loader: false,
            },
            has_siblings: false,
            idempotent_id: "",
            private_class_price_per_class: parseInt(
                this.private_classes_discount_price
            ),
            group_class_price_per_class: parseInt(
                this.group_classes_discount_price
            ),
            existingStudents: [],
            slide_animation: "",
            step: 0,
            date: "",
            phone: "",
            planId: "",
            registration: {
                phone: "",
                totalAmount: 0,
                last_date_to_put_in_class: moment().add(16, "days"),
                payment_type: "monthly",
                isPaymentSuccess: false,
                type: "subscriptions",
                registration_type: "Monthly Recurring Subscriptions",
                location_id: "",
                timeslot_duration: "",
                location: "",
                topic: "",
                topic_id: "",
                class_type: "Small Group",
                class_per_week: 1,
                billing_cycle: 1,
                selected_date: "",
                selected_date_raw: "",
                addNewStudent: false,
                selectedTaskClasses: [],
                student: "",
                parent: "",
                time_zone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                ad_source: "",
                expectations: "",
                paymentResponse: [],
                plan_id: "",
                stripe_id: null,
                payment_id: "",
                brand: "codewithus",
                isEligible: "ineligible",
                selectClassLater: false,
                selectClassLaterMessage: "",
                selected_plan: "beginner",
                class_per_month: 4,
                referral: "",
                address: "",
                starts_at: "",
                slot: {
                    existing: false,
                    slot: "",
                    slot_display: "",
                    space: "",
                    space_count: 0,
                    taskclass: { id: 0 },
                    teacher: { id: 0 },
                },
            },
            discount_two_class_per_week: 10,
            available_time_slots: "",
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: "",
                    placeholder: "Phone Number...",
                },
            },
            preferredCountries: ["US", "GB", "CA", "CN", "IN"],
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            final_amount: "",
            source: "",
            config: "",
            notification: "",
            calendar_start_date: "",
            calendar_end_date: "",
            disableDays: [],
            allowedDays: [],
            actualDays: [],
            country: {},
            phoneObject: "",
            holidays_for_scheduling: JSON.parse(
                localStorage.getItem("holidays")
            ),
            discounted_price: "",
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
            return (
                this.registration.selectedTaskClasses.length ===
                parseInt(this.registration.class_per_week)
            );
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
            return (discount / 100) * (this.sub_amount - this.discount_extra); // .1 * 1296
        },
        sub_amount() {
            return parseFloat(
                this.price_per_class *
                    this.registration.class_per_month *
                    this.registration.class_per_week *
                    this.registration.billing_cycle
            ); // 1440
        },
        discount_extra() {
            let discount = 0;
            if (this.registration.class_per_week > 1) {
                discount = parseFloat(
                    (this.discount_two_class_per_week / 100) * this.sub_amount
                ); // 144
            }
            return discount;
        },
        classPerWeekText: function () {
            if (this.registration.class_per_week > 1) return "Twice a Week";
            else return "Once a Week";
        },
        net_price() {
            return Math.floor(
                this.sub_amount -
                    this.discount_extra -
                    this.billing_cycle_discount
            ); // 1440 - 144 - 144
        },
        discount() {
            let discount = 0;
            if (this.registration.isEligible === "eligible") {
                discount = 0.1 * this.net_price;
            }
            return discount;
        },
        total_amount() {
            let total = 0;
            total = parseFloat(
                this.net_price - this.discount - this.coupon.amount_off
            ).toFixed(2);
            this.discounted_price = Math.ceil(total / 0.8) - total;
            //this.totalAmount = total;
            return total;
        },
        price_per_class() {
            if (this.registration.class_type === "Private") {
                return this.private_class_price_per_class;
            } else {
                return this.group_class_price_per_class;
            }
        },
        sliderStyle() {
            return {
                width: this.sliderPosition.width + "px",
                transform: `translateX(${this.sliderPosition.translateX}px)`,
            };
        },
    },
    created() {
        this.notificationMessage();
        this.countries.get();
        this.locations.fetchLocations();
        this.topics.fetchTopics();
        this.studentObject();
        this.parentObject();
        this.source = axios.CancelToken.source();
        this.config = { cancelToken: this.source.token };
        this.final_amount = this.total_amount;

        const interval = parseInt(localStorage.getItem("weekly_interval"), 10);
        const validIntervals = [1, 3, 6];
        // console.log('interval', interval, validIntervals.includes(interval))
        if (interval && validIntervals.includes(interval)) {
            this.registration.billing_cycle = interval;
            // console.log('interval', interval, this.registration.billing_cycle);

            // Map billing cycle (1, 3, 6) back to plan value ('monthly', etc.)
            const planMap = {
                1: "monthly",
                3: "quarterly",
                6: "semi",
            };

            const planValue = planMap[interval];
            this.$nextTick(() => {
                // Ensuring DOM is updated after registration.billing_cycle is set
                this.switchPlan(planValue);
            });
            localStorage.removeItem("weekly_interval");
        }
    },
    mounted() {
        this.$nextTick(() => {
            this.updateSlider();
        });
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
    methods: {
        handleClassTypeChange() {
            this.getAvailableTimeSlots();
        },
        handleClassPerWeekChange() {
            this.getAvailableTimeSlots();
        },
        handleBillingCycleChange() {
            this.getAvailableTimeSlots();

            // Map billing cycle to plan and update tab/slider
            const planMap = {
                1: "monthly",
                3: "quarterly",
                6: "semi",
            };

            const planValue = planMap[this.registration.billing_cycle];
            if (planValue && planValue !== this.selectedPlan) {
                this.selectedPlan = planValue;
                this.$nextTick(() => this.updateSlider()); // Optional, if needed
            }
        },
        isDuplicate(slot) {
            let isDuplicate = false;
            this.registration.selectedTaskClasses.forEach(
                (selectedTaskClass) => {
                    if (slot.slot === selectedTaskClass.slot) {
                        isDuplicate = true;
                    } else {
                        isDuplicate = false;
                    }
                }
            );
            return isDuplicate;
        },
        dateClicked(e) {
            this.available_time_slots = "";
            let current_selected_date = this.registration.selected_date_raw
                ? this.registration.selected_date_raw
                : new Date().format();
            this.registration.selected_date_raw = e;
            let enteredDate = new Date(e).format();
            let startDateMinusOne = new Date().addDays(2).format();
            let startDate = new Date().addDays(3).format();
            let endDate = new Date().addDays(365).format();
            let endDatePlusOne = new Date().addDays(366).format();
            if (
                !moment(enteredDate).isBetween(
                    startDateMinusOne,
                    endDatePlusOne
                )
            ) {
                this.notification = `Select date between ${this.filters.date_format(
                    startDate
                )} and ${this.filters.date_format(endDate)} only!`;
                return false;
            }
            if (!this.loader) {
                this.registration.selected_date = this.filters.toDateString(e);
                this.registration.selected_date_raw = e;
                this.available_time_slots = "";
                this.getAvailableTimeSlots();
            } else {
                this.notification =
                    "Please wait until the selected date classes have been loaded!";
                setTimeout(() => {
                    this.registration.selected_date_raw = current_selected_date;
                }, 300);
            }
        },
        getAvailableTimeSlots() {
            let _this = this;
            _this.available_time_slots = "";
            if (
                _this.registration.location_id &&
                _this.registration.topic_id &&
                _this.registration.timeslot_duration
            ) {
                axios
                    .post(
                        "/forms/getNewSubscriptionAvailableTimeSlots",
                        _this.registration,
                        this.config
                    )
                    .then((response) => {
                        _this.available_time_slots =
                            response.data.available_time_slots;
                        _this.flag_to_get_available_call_slots = true;
                    });
            }
        },
        submitStepTwo() {
            let _this = this;
            _this.registration.parent.phone = _this.phoneObject;
            _this.registration.parent.phone_number =
                _this.phoneObject.nationalNumber;
            if (_this.registration.parent.full_name === "") {
                _this.registration.parent.full_name =
                    _this.registration.student.full_name;
            }
            axios
                .post("/web/setSubscriptionFormStepTwo", _this.registration)
                .then((response) => {
                    this.next();
                });
        },
        updateSlider(activeButton) {
            // If not passed in (e.g., on mount), find the selected button manually
            if (!activeButton) {
                const tabs = this.$refs.planTabs;
                activeButton = Array.isArray(tabs)
                    ? tabs.find((btn) => btn.dataset.plan === this.selectedPlan)
                    : tabs;
            }

            if (activeButton) {
                const rect = activeButton.getBoundingClientRect();
                const containerRect =
                    activeButton.parentElement.getBoundingClientRect();

                this.sliderPosition.width = rect.width;
                this.sliderPosition.translateX = rect.left - containerRect.left;
            }
        },
    },
};
</script>

<style scoped>
.MyCardElement {
    @apply px-2 py-3 my-2 sm:text-sm border-gray-100 bg-gray-100 rounded-full;
}
</style>
