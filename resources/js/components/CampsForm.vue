<template>
    <div>
        <div v-if="step === 0">
            <section class="pt-5">
                <div class="max-w-3xl mx-auto">
                  <div class="mb-2 flex flex-col md:flex-row justify-start border-b px-5">
                    <div v-if="!locationsStore.locations.length" class="w-full">
                      <p class="flex flex-col items-center justify-center">Camps are loading, please wait...
                        <svg class="animate-spin w-10 h-10 text-black" fill="currentColor" width="24" height="24" viewBox="0 0 24 24" stroke="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" >
                          <path d="M17.65,6.35C16.2,4.9 14.21,4 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20C15.73,20 18.84,17.45 19.73,14H17.65C16.83,16.33 14.61,18 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6C13.66,6 15.14,6.69 16.22,7.78L13,11H20V4L17.65,6.35Z" />
                        </svg>
                      </p>
                      <div class="max-w-3xl mx-auto">
                        <div class="flex justify-center">
                          <div class="relative bg-gray-200 rounded-full p-1 flex">
                            <button disabled class="relative px-6 py-3 text-lg font-medium rounded-full whitespace-nowrap z-10 text-white">Campbell, CA</button>
                            <button disabled class="relative px-6 py-3 text-lg font-medium rounded-full whitespace-nowrap z-10 text-gray-600">Online Classroom</button>
                            <button disabled class="relative px-6 py-3 text-lg font-medium rounded-full whitespace-nowrap z-10 text-gray-600">AI Online Camp</button>
                            <!-- Static background for loading state -->
                            <div class="absolute top-1 bottom-1 bg-teal-600 rounded-full z-0" style="left: 4px; width: calc(33.333% - 8px);"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div v-else class="w-full overflow-x-auto">
                        <div class="flex justify-center px-2">
                          <div class="relative bg-gray-200 rounded-full p-1 flex">
                            <button
                              v-for="(location, index) in locationsStore.locations"
                              :key="location.id"
                              @click="changeLocation(location)"
                              class="relative px-6 py-3 text-lg font-medium transition-all duration-300 rounded-full whitespace-nowrap z-10"
                              :class="location.id === locationsStore.location.id
                                ? 'text-white'
                                : 'text-gray-600 hover:text-gray-800'">
                              {{ location.location_name }}
                            </button>
                            <!-- Sliding background -->
                            <div
                              class="absolute top-1 bottom-1 bg-teal-600 rounded-full transition-all duration-300 ease-in-out z-0"
                              :style="getSliderStyle()"
                            ></div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <p class="text-center py-2" v-if="locationsStore.location">{{locationsStore.location.address}}</p>
                </div>
            </section>

            <!-- Carousel -->
            <section class="pt-2" v-if="locationsStore.locations.length" ref="campsData">
            <div class="max-w-5xl mx-auto bg-white md:p-5 space-y-5">
                <div class="py-3 row" v-if="campStore.groups_count > 0">

                <div class="accordion-item border border-gray-200 rounded-lg mb-4" v-for="(group, index) in campStore.groups" :key="group.id">
                    <div class="accordion-header">
                        <button
                            @click="toggleAccordion(index)"
                            class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 rounded-t-lg focus:outline-none focus:bg-gray-100 transition-colors duration-200 flex items-center justify-between"
                            :class="{ 'rounded-lg': !accordionOpen[index] }"
                        >
                            <h5 class="font-weight-bolder text-lg" :class="group.isGroupLimitExceeded ? 'text-danger':''">
                                {{group.name}} {{ (group.isGroupLimitExceeded)?' -- Full':'' }}
                            </h5>
                            <svg
                                class="w-5 h-5 transition-transform duration-200"
                                :class="{ 'rotate-180': accordionOpen[index] }"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                    <div
                        class="accordion-content overflow-hidden transition-all duration-300"
                        :class="accordionOpen[index] ? 'max-h-screen opacity-100' : 'max-h-0 opacity-0'"
                    >
                        <div class="py-3 px-6">
                            <camps-slider :camps_data="group.topics" :group_data="group" :seasonal_camps_dp="seasonal_camps_dp" :seasonal_camps_fp="seasonal_camps_fp" :selected_location_price="locationsStore.location.starting_price" @topic-selected="enrollTopicSelected"></camps-slider>
                            <!-- <Carousel :settings="settings" :breakpoints="breakpoints">
                            <Slide class="bg-white" v-for="topic in group.topics" :key="topic.id">
                                <div class="carousel__item rounded-3xl shadow p-2 md:p-0 m-1 md:m-3">
                                <div class="relative">
                                    <img class="object-cover object-center rounded-t-3xl md:max-h-72"
                                    :src="`https://portal.codewithus.com/images/topics/${topic.image_name_camps}`"
                                    alt="scratch">
                                    <div class="absolute right-0 bottom-0 -mb-4"></div>
                                </div>
                                <div class="pt-2 pb-2 px-2">
                                    <div class="text-center" @click="next(topicSelected(group, topic));" v-if="!group.isGroupLimitExceeded">
                                    <a href="#campsForm"
                                        class="inline-flex items-center gap-2 px-5 py-2 border border-transparent text-base font-medium rounded-full text-white bg-camps hover:text-white hover:bg-camps-darker-1 focus:outline-none focus:ring-camps">
                                        <span>Enroll</span>
                                        <svg width="13" height="11" viewBox="0 0 13 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    </div>
                                    <div class="text-center" v-if="group.isGroupLimitExceeded">
                                    <button class="inline-flex items-center gap-2 px-5 py-2 border border-transparent text-base font-medium rounded-full text-white bg-red-500 cursor-not-allowed hover:text-white hover:bg-camps-darker-1 focus:outline-none focus:bg-red-500" :disabled="group.isGroupLimitExceeded">Full
                                        <svg width="13" height="11" viewBox="0 0 13 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    </div>
                                </div>
                                </div>
                            </Slide>
                            <template #addons>
                                <Navigation />
                                <pagination />
                            </template>
                            </Carousel> -->
                        </div>
                    </div>
                </div>
            </div>

                <div v-if="!campStore.groups_count" class="m-5 space-y-10 flex justify-center">Camps not available</div>
            </div>
            </section>
        </div>

        <!-- Steps -->
        <div class="max-w-5xl mx-auto" v-show="step > 0">
            <div>
            <div class="px-3 md:px-0">
                <div class="space-y-8 shadow-card rounded-3xl p-10 md:px-10 overflow-x-hidden">
                <div class="flex items-center justify-between">
                    <div
                    class="hidden sm:flex items-center bg-white rounded-md cursor-pointer shadow px-2 py-2.5 space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-full text-gray-200"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 19.5 8.25 12l7.5-7.5"></path>
                        </svg>
                        <div class=" ml-4 text-sm text-gray-500 hover:text-gray-700" @click="back"> Back</div>
                    </div>
                    <div class="hidden sm:flex flex-col justify-center items-center">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="bg-white rounded-md shadow px-6 flex space-x-4">


                        <li class="flex items-center" @click="step = 0" v-if="step > 0">
                            <a href="#" class="ml-1 text-sm text-gray-500 hover:text-gray-700">Topics Options</a>
                        </li>
                        <li v-if="step > 0" class="flex" @click="step = 1">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                                    preserveAspectRatio="none" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"></path>
                                </svg>
                                <a href="#campsForm"
                                    :class="step === 1 ? 'text-primary hover:text-primary-darker-1' : 'text-gray-500 hover:text-gray-700'"
                                    class="ml-4 text-sm text-gray-500 hover:text-primary-darker-1">Session Options</a>
                            </div>
                        </li>
                        <li v-if="step > 1" class="flex">
                            <div class="flex items-center" @click="step = 2">
                                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                                    preserveAspectRatio="none" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"></path>
                                </svg>
                                <a href="#campsForm"
                                    :class="step === 2 ? 'text-primary hover:text-primary-darker-1' : 'text-gray-500 hover:text-gray-700'"
                                    class="ml-4 text-sm text-gray-500 hover:text-primary-darker-1">Student
                                    Info</a>
                            </div>
                        </li>
                        <li v-if="step > 2" class="flex">
                            <div class="flex items-center" @click="step = 3">
                                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                                    preserveAspectRatio="none" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"></path>
                                </svg>
                                <a href="#campsForm"
                                    :class="step === 3 ? 'text-primary hover:text-primary-darker-1' : 'text-gray-500 hover:text-gray-700'"
                                    class="ml-4 text-sm text-gray-500 hover:text-primary-darker-1">Order
                                    Confirmation </a>
                            </div>
                        </li>
                        <li v-if="step > 3" class="flex">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44"
                                    preserveAspectRatio="none" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"></path>
                                </svg>
                                <a href="#campsForm"
                                    :class="step === 4 ? 'text-primary hover:text-primary-darker-1' : 'text-gray-500 hover:text-gray-700'"
                                    class="ml-4 text-sm text-primary hover:text-primary-darker-1">Payment</a>
                            </div>
                        </li>
                        </ol>
                    </nav>
                    </div>

                    <!-- Mobile breadcrumb / step title -->
                    <div v-if="step < 5" class="sm:hidden bg-white rounded-md shadow px-4 py-3 mt-3 mx-auto">
                        <div class="flex flex-col items-center justify-center space-y-2">
                        <!-- Step title -->
                        <span class="text-sm font-medium text-gray-700">
                            <template v-if="step === 0">Topics Options</template>
                            <template v-else-if="step === 1">Session Options</template>
                            <template v-else-if="step === 2">Student Info</template>
                            <template v-else-if="step === 3">Order Confirmation</template>
                            <template v-else-if="step === 4">Payment</template>
                        </span>

                        <!-- Back button -->
                        <button
                            v-if="step > 0"
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


                    <div>

                    </div>
                </div>
                <section class="py-5 md:py-10">
                    <div v-if="currentRegistration.location" ref="campSummary">
                    <h3 class="text-center pt-8 pb-0">Schedule a Camp</h3>
                    <p class="text-center">{{currentRegistration.group?.name}} - {{currentRegistration.location.location_name}}
                    </p>
                    <p class="text-center">{{currentRegistration.location.address}}</p>
                    </div>

                    <form class="divide-y divide-black-lighter-4" v-if="step === 1" @submit.prevent="next()">
                        <div class="max-w-xl mx-auto space-y-8 pb-20">
                            <div class="pt-2">
                                <div class="mt-6 grid grid-cols-1">
                                <div class="space-y-7">
                                    <div>
                                    <label class="block text-sm text-gray-700">Choose Session
                                        ({{filters.format_time_zone(currentRegistration.timezone)}})</label>
                                    <div class="mt-1">
                                        <select v-model="currentRegistration.session" required @change="calculateAmount"
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                                        <option disabled selected value="">Choose Camp</option>
                                        <option :disabled="(session.isLimitExceeded) || (session.is_full_session && !session.isLimitAvailable)" v-for="session in campStore.group_sessions" :value="session"
                                            :key="session.id">{{session.name}}:
                                            {{session.starts_at}}-{{session.ends_at}}
                                            ({{session.starting_day}} - {{ session.ending_day }})
                                            ${{session.price}} {{ ((session.isLimitExceeded) || (session.is_full_session && !session.isLimitAvailable))?'-- Full' :'' }} </option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="flex items-center pt-5"
                                    v-if="currentRegistration.group?.optional_date && currentRegistration.session">
                                    <input type="checkbox" v-model="currentRegistration.optional_date"
                                    @change="calculateAmount">
                                    <label class="ml-3 block text-sm text-gray-400 mt-1">Friday : <span
                                        class="text-primary hover:text-primary-darker-1">${{currentRegistration.session.optional_price}}</span>
                                    (Optional) </label>
                                </div>
                                </div>
                                <div class="pt-10">
                                <div class="flex justify-center">
                                    <button type="submit"
                                    class="btn bg-primary text-white"> Add Student
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Choose a Student -->
                    <section class="py-5 md:py-10" v-if="step == 2" ref="phone">
                    <form class="md:px-36" @submit.prevent="next()">
                        <div class="space-y-8">
                        <div class="pt-2">
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6">
                            <div class="" v-if="registrations.length == 1">
                                <label class="block text-sm text-gray-700 ">Phone Number <span
                                class="text-danger font-bold text-xl">*</span> </label>
                                <div class="mt-1">
                                <vue-tel-input v-bind="bindProps"
                                    :preferredCountries="preferredCountries" :autoFormat="false"
                                    @input="phoneInput" @blur="getStudentsData"
                                    @country-changed="getStudentsData" :autoDefaultCountry="true"
                                    required></vue-tel-input>
                                </div>
                            </div>

                            <div class="" v-if="registrations.length == 1">
                                <label class="block text-sm text-gray-700">Email <span
                                class="text-danger font-bold text-xl">*</span></label>
                                <div class="mt-1">
                                <input required type="email" placeholder="Email"
                                    v-model="currentRegistration.parent.email"
                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                                </div>
                            </div>
                            <div class="md:col-span-2" v-if="studentStore.students.length">
                                <fieldset class="mt-6">
                                <div>
                                    <div class="text-black-lighter-2 flex">Choose a Student <span
                                        class="text-danger font-bold text-xl">*</span></div>
                                    <p class="text-sm text-gray-500">Select an existing student
                                    below or add new</p>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 mt-4 space-y-2">
                                    <div class="flex items-center"
                                        v-for="student in studentStore.students" :key="student.id">
                                        <input type="checkbox"
                                        :value="student"
                                        :checked="currentRegistration.students && currentRegistration.students.includes(student)"
                                        @change="toggleStudent(student)"
                                        class="focus:ring-primary h-4 w-4 text-primary border-gray-300">
                                        <label
                                        class="ml-3 block text-sm text-gray-700 capitalize">{{student.full_name}}</label>
                                    </div>
                                </div>
                                </fieldset>
                            </div>

                            <div class="md:col-span-2 text-info">
                                <div class="flex items-center justify-end space-x-3"
                                >
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                    d="M8.48438 0.35504C8.95776 0.35504 9.34152 0.738796 9.34152 1.21218L9.34152 7.62814L15.7575 7.62814C16.2309 7.62814 16.6146 8.01189 16.6146 8.48528C16.6146 8.95867 16.2309 9.34242 15.7575 9.34242L9.34152 9.34242V15.7584C9.34152 16.2318 8.95776 16.6155 8.48438 16.6155C8.01099 16.6155 7.62723 16.2318 7.62723 15.7584V9.34242L1.21128 9.34242C0.737889 9.34242 0.354133 8.95867 0.354134 8.48528C0.354134 8.01189 0.73789 7.62814 1.21128 7.62814L7.62723 7.62814L7.62723 1.21218C7.62723 0.738796 8.01099 0.35504 8.48438 0.35504Z"
                                    fill="#4A77C4" />
                                </svg>
                                <p class="text-info cursor-pointer"  @click="addANewStudent">Add a New Student</p>
                                </div>
                            </div>




                            <!-- <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6"
                                v-if="!currentRegistration.student.id">
                                <div class="md:col-span-2 pt-5">
                                <label class="text-sm text-gray-700 flex">How did you hear about us?
                                    <span class="text-danger font-bold text-xl">*</span></label>
                                <div class="mt-1">
                                    <input v-model="currentRegistration.ad_source" type="text" required
                                    placeholder="How did you hear about us?"
                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                                </div>
                                </div>
                            </div> -->
                            </div>
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-12 gap-3 md:gap-6"
                                v-if="studentStore.addStudent">
                                <div class="col-span-4">
                                <label class="text-sm text-gray-700 flex">Student Name <span
                                    class="text-danger font-bold text-xl">*</span></label>
                                <div class="mt-1">
                                    <input type="text" placeholder="Student Name"
                                    v-model="currentRegistration.student.full_name" required
                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                                </div>
                                </div>
                                <div class="col-span-4">
                                <label class="text-sm text-gray-700 flex">Age <span
                                    class="text-danger font-bold text-xl">*</span></label>
                                <div class="mt-1">
                                    <input type="number" placeholder="Age"
                                    v-model="currentRegistration.student.age" required
                                    class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                                </div>
                                </div>

                                <div class="col-span-4 mt-8">
                                    <label class="text-sm text-gray-700 flex"></label>
                                    <button type="button"
                                            @click="addStudentToParentInMultiCamps"
                                            class="btn w-full md:w-auto bg-primary text-white px-6 py-2 rounded-lg">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="pt-5">
                        <div class="flex justify-center">
                            <button type="submit"
                                :class="{
                                    'w-full md:w-max bg-primary text-white': true,
                                    'disabled:opacity-50 disabled:cursor-not-allowed': !(currentRegistration.students.length > 0 || studentStore.addStudent)
                                }"
                                :disabled="!(currentRegistration.students.length > 0 || studentStore.addStudent)"
                                class="btn" style="display: block;">
                                Next
                            </button>
                        </div>
                        </div>
                    </form>
                    </section>

                    <section class="py-5 md:py-10" v-if="step === 3">
                        <div class="space-y-20">
                        <h5 class="text-center font-bold">Are you sure you want to book a camp?</h5>

                        <!-- Flatten the registrations array to extract all students -->
                        <div v-for="(student, index) in allStudents" :key="index" class="md:px-32 space-y-2 mb-8 pb-8 border-b">
                            <h6 class="font-bold">Camp Registration {{ index + 1 }}</h6>

                            <!-- Display student details -->
                            <div class="space-y-2 p-4 border rounded-md bg-gray-100">
                            <p><span class="font-bold text-primary">Original Price:</span> <span class="capitalize">${{ student.original_amount.toFixed(2) }}</span></p>
                            <p><span class="font-bold text-primary">Coupon:</span> <span class="capitalize">${{ student.coupon_amount.toFixed(2) }}</span></p>
                            <p><span class="font-bold text-primary">Extended Price:</span> <span class="capitalize">${{ student.amount.toFixed(2) }}</span></p>
                            <p><span class="font-bold text-primary">Student Name:</span> <span class="capitalize">{{ student.full_name }}</span></p>
                            <!-- <p><span class="font-bold text-primary">Email:</span> {{ student.parent.email }}</p>
                            <p><span class="font-bold text-primary">Phone Number:</span> {{ student.parent.phone_number || student.phone.nationalNumber }}</p> -->
                            <p><span class="font-bold text-primary">Camp:</span> {{ student.group.name }}</p>
                            <p><span class="font-bold text-primary">Days and Time:&nbsp;</span>
                                <span class="capitalize"> {{ student.session.starting_day }} to {{ student.optional_date ? student.group.optional_day : student.session.ending_day }} - {{ student.camp_timing }} ({{ filters.format_time_zone(student.timezone) }})</span>
                            </p>
                            <!-- Days and Time: Mon to Fri - 9:00am to 12:00pm (Pacific)
                            <p><span class="font-bold text-primary">Camp Timing:&nbsp;</span>
                                <span class="capitalize"> </span>
                            </p> -->
                            <p><span class="font-bold text-primary">Topic:</span> <span class="capitalize">{{ student.topic.name }}</span></p>
                            <p><span class="font-bold text-primary">Location:</span> {{ student.location.address }}</p>
                            <!-- <p><span class="font-bold text-primary">Address:</span> {{ student.location.address }}</p> -->
                            </div>
                        </div>

                        <!-- Common Parent Details -->
                        <!-- Parent Details Styled Like Camp Registration -->
                        <!-- <div class="md:px-32 space-y-2 mb-8 pb-8 border-b"> -->
                            <!-- <h6 class="font-bold">Parent Details</h6> -->

                        <!-- </div> -->

                        <!-- Total Amount -->
                        <div class="md:px-32 space-y-2 mb-8 pb-8">
                            <h6 class="font-bold">Parent Details</h6>
                            <div class="space-y-2 p-4 border rounded-md bg-gray-100">
                                <p><span class="font-bold text-primary">Email:</span> <span class="capitalize">{{ allStudents[0].parent.email }}</span></p>
                                <p><span class="font-bold text-primary">Phone Number:</span> <span class="capitalize">{{ allStudents[0].parent.phone_number || allStudents[0].phone.nationalNumber }}</span></p>
                            </div>
                            <h6 class="font-bold">Total Amount</h6>
                            <div class="space-y-2 p-4 border rounded-md bg-gray-100 flex items-center justify-between">
                                <h6 class="font-bold text-primary">Total:</h6>
                                <h6 class="text-primary p-1 px-4 font-bold bg-blue-100 rounded flex items-center gap-1" @click="isModalOpen = true">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" xml:space="preserve">
                                        <path fill="#18CEF6" d="M26.029 58.156c-1.683 0-3.047 1.334-3.047 2.979 0 1.646 1.364 2.979 3.047 2.979s3.047-1.333 3.047-2.979c0-1.645-1.364-2.979-3.047-2.979zm17.795 0c-1.682 0-3.046 1.334-3.046 2.979 0 1.646 1.364 2.979 3.046 2.979 1.683 0 3.047-1.333 3.047-2.979 0-1.645-1.364-2.979-3.047-2.979z"/>
                                    </svg>
                                    ${{ totalAmount.toFixed(2) }}
                                </h6>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-center justify-center text-center">
                            <input required type="checkbox" name="student" v-model="termsAndConditions">
                            <label class="ml-3 block text-sm text-gray-400 mt-1">
                            I agree to the <a :href="drive_link" class="text-primary hover:text-primary-darker-1" target="_blank">terms of service, billing, and privacy policy</a> of Code With Us
                            </label>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                            <button type="button" @click="back()" class="btn w-full md:w-max text-primary justify-center">Back</button>
                            <button type="button" class="btn bg-primary text-white justify-center" @click="addMore()">Add Another Camp</button>
                            <button type="submit" :disabled="!termsAndConditions" class="btn w-full md:w-max bg-primary text-white justify-center" @click="redirectToCheckout()">Book Camps</button>
                        </div>
                        </div>
                    </section>


                    <!-- Payment Methods -->
                    <section class="py-5 md:py-10" v-show="step === 4">
                        <form id="campSignUpForm" @submit.prevent="getPaymentMethod">
                            <div class="mx-auto justify-center space-y-16 divide-y" :class="step === 4 ? 'max-w-5xl' : 'max-w-2xl'">

                                <div class="">

                                    <div id="checkout">
                                        <!-- Checkout will insert the payment form here -->
                                    </div>

                                    <p class="text-danger capitalize" v-if="stripe_error">Error : {{ stripe_error }}
                                    </p>

                                </div>
                            </div>
                        </form>
                    </section>

                    <section class="py-5 md:py-10" v-if="step === 5" >
                        <div class="space-y-10">
                        <h5 class="text-success text-center font-bold">Thank you!</h5>
                        <p class="text-success text-center">You successfully booked your camps!</p>
                        <!-- Flatten the registrations array to extract all students -->
                        <div v-for="(student, index) in allStudents" :key="index" class="md:px-32 space-y-2 mb-8 pb-8 border-b">
                            <h6 class="font-bold">Camp Registration {{ index + 1 }}</h6>

                            <!-- Display student details -->
                            <div class="space-y-2 p-4 border rounded-md bg-gray-100">
                            <p><span class="font-bold text-primary">Original Price:</span> <span class="capitalize">${{ student.original_amount.toFixed(2) }}</span></p>
                            <p><span class="font-bold text-primary">Coupon:</span> <span class="capitalize">${{ student.coupon_amount.toFixed(2) }}</span></p>
                            <p><span class="font-bold text-primary">Extended Price:</span> <span class="capitalize">${{ student.amount.toFixed(2) }}</span></p>
                            <p><span class="font-bold text-primary">Student Name:</span> <span class="capitalize">{{ student.full_name }}</span></p>
                            <!-- <p><span class="font-bold text-primary">Email:</span> {{ student.parent.email }}</p>
                            <p><span class="font-bold text-primary">Phone Number:</span> {{ student.parent.phone_number || student.phone.nationalNumber }}</p> -->
                            <p><span class="font-bold text-primary">Camp:</span> {{ student.group.name }}</p>
                            <p><span class="font-bold text-primary">Days and Time:&nbsp;</span>
                                <span class="capitalize"> {{ student.session.starting_day }} to {{ student.optional_date ? student.group.optional_day : student.session.ending_day }} - {{ student.camp_timing }} ({{ filters.format_time_zone(student.timezone) }})</span>
                            </p>
                            <!-- <p><span class="font-bold text-primary">Camp Timing:&nbsp;</span>
                                <span class="capitalize"> {{ student.camp_timing }}</span>
                            </p> -->
                            <p><span class="font-bold text-primary">Topic:</span> <span class="capitalize">{{ student.topic.name }}</span></p>
                            <p><span class="font-bold text-primary">Location:</span> {{ student.location.address }}</p>
                            <!-- <p><span class="font-bold text-primary">Address:</span> {{ student.location.address }}</p> -->
                            </div>
                        </div>

                        <!-- Common Parent Details -->
                        <!-- <div class="space-y-2">
                            <p><span class="font-bold text-primary">Email:</span> {{ allStudents[0].parent.email }}</p>
                            <p><span class="font-bold text-primary">Phone Number:</span> {{ allStudents[0].parent.phone_number || allStudents[0].phone.nationalNumber }}</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <h6 class="font-bold">Total Amount:</h6>
                            <h6 class="text-primary p-1 px-4 font-bold bg-blue-100 rounded">
                            ${{ totalAmount.toFixed(2) }}
                            </h6>
                        </div> -->

                        <div class="md:px-32 space-y-2 mb-8 pb-8">
                            <h6 class="font-bold">Parent Details</h6>
                            <div class="space-y-2 p-4 border rounded-md bg-gray-100">
                                <p><span class="font-bold text-primary">Email:</span> <span class="capitalize">{{ allStudents[0].parent.email }}</span></p>
                                <p><span class="font-bold text-primary">Phone Number:</span> <span class="capitalize">{{ allStudents[0].parent.phone_number || allStudents[0].phone.nationalNumber }}</span></p>
                            </div>
                            <h6 class="font-bold">Total Amount</h6>
                            <div class="space-y-2 p-4 border rounded-md bg-gray-100 flex items-center justify-between">
                                <h6 class="font-bold text-primary">Total:</h6>
                                <h6 class="text-primary p-1 px-4 font-bold bg-blue-100 rounded flex items-center gap-1" @click="isModalOpen = true">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" xml:space="preserve">
                                        <path fill="#18CEF6" d="M26.029 58.156c-1.683 0-3.047 1.334-3.047 2.979 0 1.646 1.364 2.979 3.047 2.979s3.047-1.333 3.047-2.979c0-1.645-1.364-2.979-3.047-2.979zm17.795 0c-1.682 0-3.046 1.334-3.046 2.979 0 1.646 1.364 2.979 3.046 2.979 1.683 0 3.047-1.333 3.047-2.979 0-1.645-1.364-2.979-3.047-2.979z"/>
                                    </svg>
                                    ${{ totalAmount.toFixed(2) }}
                                </h6>
                            </div>
                        </div>
                        </div>
                    </section>

                    <hr>
                    <div class="flex md:flex-col items-center justify-center space-x-3 py-3 pt-10 text-sm">
                    <p>Don't see something that fits your schedule?</p>
                    <p class="underline"><a href="mailto:info@codewithus.com" target="_blank"> Send a custom
                        request to the team </a></p>
                    </div>
                </section>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <transition name="fade">
      <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-5xl w-full h-[450px] overflow-y-auto px-20" @click.stop>
          <div>
            <div class="flex items-center justify-end">
              <button @click="isModalOpen = false">
                <svg class="w-5 h-5 text-primary hover:text-danger " xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 16 16" fill="currentColor">
                  <title>Close</title>
                  <path fill-rule="evenodd"
                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm2.78-4.22a.75.75 0 0 1-1.06 0L8 9.06l-1.72 1.72a.75.75 0 1 1-1.06-1.06L6.94 8 5.22 6.28a.75.75 0 0 1 1.06-1.06L8 6.94l1.72-1.72a.75.75 0 1 1 1.06 1.06L9.06 8l1.72 1.72a.75.75 0 0 1 0 1.06Z"
                    clip-rule="evenodd" />
                </svg>
              </button>
            </div>
            <div>
              <div class="bg-white">
                <div class="mx-auto max-w-5xl">
                  <h1 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-2xl">
                    Camps Cart</h1>

                  <form class="mt-2">
                    <section aria-labelledby="cart-heading">
                      <h2 id="cart-heading" class="sr-only">Items in your cart</h2>
                      <ul role="list"
                        class="divide-y divide-gray-200 border-b border-t border-gray-200">
                        <li class="flex py-2" v-for="(registration, index) in registrations" :key="index">
                          <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                            <div>
                              <div class="flex items-center justify-between">
                                <div
                                  class="text-sm flex justify-center items-center space-x-3">
                                  <button type="button"
                                    class="text-sm font-medium text-red-500 hover:text-red-700"
                                    @click="removeRegistration(index)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                      viewBox="0 0 24 24" stroke-width="1.5"
                                      stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                  </button>
                                  <a href="#"
                                    class="font-medium text-gray-700 hover:text-gray-800">{{ registration.group.name }} - {{ registration.session.starting_day }} to {{ registration.session.ending_day }}</a>
                                </div>
                                <p class="ml-4 text-sm font-medium text-gray-900">${{ calculateRegistrationAmount(registration).toFixed(2) }}</p>
                              </div>
                              <div class="mt-1 text-sm text-gray-500">
                                <p v-if="registration.students && registration.students.length">
                                  <span v-for="(student, studentIndex) in registration.students" :key="studentIndex">
                                    {{ student.full_name }}{{ studentIndex < registration.students.length - 1 ? ', ' : '' }}
                                  </span>
                                </p>
                                <p v-else-if="registration.student && registration.student.full_name">
                                  {{ registration.student.full_name }}
                                </p>
                                <p v-else>No student name provided</p>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </section>

                    <!-- Order summary -->
                    <section aria-labelledby="summary-heading" class="mt-10">
                      <h2 id="summary-heading" class="sr-only">Order summary</h2>
                      <div>
                        <dl class="space-y-4">
                          <div class="flex items-center justify-between">
                            <dt class="text-base font-medium text-gray-900">Subtotal</dt>
                            <dd class="ml-4 text-base font-medium text-gray-900">${{ totalAmount.toFixed(2) }}</dd>
                          </div>
                        </dl>
                      </div>
                      <div class="mt-10">
                        <button type="button"
                          class="btn bg-primary text-white w-full justify-center" @click="proceedToCheckout">Checkout
                        </button>
                      </div>

                      <div class="mt-6 text-center text-sm">
                        <p>
                          or
                          <a href="#" class="font-medium text-primary hover:text-primary-active" @click="continueShopping">
                            Continue Shopping
                            <span aria-hidden="true"> &rarr;</span>
                          </a>
                        </p>
                      </div>
                    </section>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
<loader></loader>
<Notification></Notification>
</template>

  <script>
  import 'vue3-carousel/dist/carousel.css'
  import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
  import { useLocationsStore } from "../store/locations";
  import { useCampStore } from "../store/campStore";
  import { useFiltersStore } from "../store/filtersStore";
  import { useStudentsStore } from "../store/studentsStore";

  let stripe = Stripe("pk_live_516dVSfF9uOieGMSt6Qeg8rOw4qbphnczqA98pthtHhcOAfGtCLeqFCbTi7kNzq1q8dfFD5diFn6pl97SxMw4VNCM00SHImDA69");
//   let stripe = Stripe("pk_test_516dVSfF9uOieGMSt1f9SDZ684fKcYd7hocVBUMs4yyJbikYit4S3GKus0Jw8QYfYzyNOimuPDoLBPq1KgVkSkzW900USvWxqzE");

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
              color: "#aab7c4"
          }
      },
      invalid: {
          color: "#fa755a",
          iconColor: "#fa755a"
      }
  }

  export default {
    name: 'MultiCampsForm',
    props: [ 'seasonal_camps_dp','seasonal_camps_fp' ],
    components: { Carousel, Slide, Pagination, Navigation },
    setup() {
      const locationsStore = useLocationsStore();
      const campStore = useCampStore();
      const filters = useFiltersStore();
      const studentStore = useStudentsStore();
      return {
        locationsStore, campStore, filters, studentStore
      }
    },
    data() {
      return {
        planId:'price_1ORmEhF9uOieGMSt6mJawIEt',
        isModalEnroll: false,
        isModalOpen: false,
        step: 0,
        addStudent: false,
        bookForm: false,
        // Carousel
        settings: {
          itemsToShow: 1,
          snapAlign: 'center',
        },
        breakpoints: {
          600: {
            itemsToShow: 2,
            snapAlign: 'center',
          },
          1024: {
            itemsToShow: 4,
            snapAlign: 'start',
          },
        },
        registrations: [],
        currentRegistration: {
          phone: null,
          group: null,
          topic: null,
          session: '',
          type: 'camps',
          class_type: 'Camps',
          selected_date: new Date(),
          location: null,
          optional_date: false,
          students: [],
          student: {
            id: '',
            full_name: '',
            age: '',
            email: ''
          },
          parent: {
            id: '',
            full_name: '',
            age: '',
            email: '',
            stripe_id: '',
          },
          timezone: "America/Los_Angeles",
        },
        totalAmount: 0,
        preferredCountries: ['US', 'GB', 'CA', 'CN', 'IN'],
        bindProps: {
          inputOptions: {
            required: true,
            styleClasses: '',
            placeholder: 'Phone Number'
          }
        },
        termsAndConditions: false,
        voucherCode: '',
        agreeToTerms: false,
        drive_link: 'https://example.com/terms-of-service',
        selected_location_id: '',
        tempGroups: [],
        checkout: null,
        accordionOpen: [],
        stripe_error: null,
        coupons: {
          id: null,
          isValid: false,
          amount_off: 0
        },
        serverTotalAmount: 0,
      }
    },
    created() {
        this.locationsStore.fetchFormsLocations({'location_type': 'camps'}).then(() => {
            const selectedLocation = this.locationsStore.location;
            if (selectedLocation && selectedLocation.id === 19) {
                this.changeLocation(selectedLocation);
            }
        });
        this.addNewRegistration()
    },
    computed: {
        totalAmount() {
            return this.serverTotalAmount > 0
            ? this.serverTotalAmount // Use API response if available
            : this.registrations.reduce((total, registration) => {
                return total + this.calculateRegistrationAmount(registration);
                }, 0);
        },
        allStudents() {
            // console.log('allStudents',this.registrations)
            return this.registrations.flatMap(registration => {
                const discount = this.calculateDiscount(registration, this.getCoupon(registration));

                return registration.students.map(student => ({
                    ...student,
                    group: registration.group,
                    session: registration.session,
                    topic: registration.topic,
                    location: registration.location,
                    optional_date: registration.optional_date,
                    timezone: registration.timezone,
                    parent: registration.parent,
                    phone: registration.phone,
                    camp_timing: registration.session.starts_at+' to '+registration.session.ends_at,
                    ...discount // Add discount-related keys
                }));
            });
        },
    },
    methods: {
        calculateDiscount(registration, coupon) {
            const basePrice = registration.session?.price || 0;
            const optionalPrice = registration.optional_date ? (registration.session?.optional_price || 0) : 0;
            const unitAmount = basePrice + optionalPrice;
            let finalAmount = unitAmount;
            const discountPercentage = ((unitAmount / 0.8 - unitAmount) / (unitAmount / 0.8)) * 100 || null;
            const originalPrice = unitAmount / 0.8 || null;

            let isCoupon = false;
            let couponPercentage = 0;
            let couponAmount = coupon?.amount_off || 0;

            if (couponAmount > 0) {
                finalAmount -= couponAmount;
                couponPercentage = (couponAmount / unitAmount) * 100 || null;
                isCoupon = true;
            }

            return {
                amount: finalAmount,
                original_amount: Math.round(originalPrice * 100) / 100 || null,
                percentage_off: discountPercentage || null,
                coupon_percentage_off: couponPercentage || null,
                is_coupon: isCoupon || null,
                coupon_amount: couponAmount
            };
        },
        getCoupon(registration) {
            // Implement logic to fetch the coupon related to the registration
            return this.coupon || {}; // Replace with actual coupon logic
        },
        changeStep() {
            this.step++;
        },
        next(callback = null) {
            // write code here to smooth scroll the page to element id #campsForm
            const campsForm = document.getElementById('campsForm');
            if (campsForm) {
                campsForm.scrollIntoView({ behavior: "smooth", block: "start" });
            }



            if (callback) {
            callback();
            }
            this.step++;

            this.$nextTick(() => {
                if (this.step === 2) {
                    // console.log(this.step, '2');
                    if (this.$refs.phone) {
                        this.$refs.phone.scrollIntoView({ behavior: "smooth", block: "start" });
                    }
                }
                if (this.step === 5) {
                    // console.log(this.step, '5');
                    if (this.$refs.campSummary) {
                        this.$refs.campSummary.scrollIntoView({ behavior: "smooth", block: "start" });
                    }
                }
            });
        },
        back() {
            const campsForm = document.getElementById('campsForm');
            if (campsForm) {
                campsForm.scrollIntoView({ behavior: "smooth", block: "start" });
            }
            this.step--;
        },
        changeLocation(location) {
            this.locationsStore.location = location;
            this.currentRegistration.location = location;
            this.selected_location_id = location.id;
            this.campStore.fetchFormsGroupsTopics({'location_id': location.id});
        },
        topicSelected(group, topic) {
            this.currentRegistration.group = group;
            this.currentRegistration.topic = topic;
            this.currentRegistration.location = this.locationsStore.location;
            this.tempGroups = this.campStore.groups;
            this.campStore.fetchFormsGroupsSessions({id: group.id});
            this.campStore.groups = this.tempGroups;
        },
        calculateRegistrationAmount(registration) {
            const basePrice = registration.session?.price || 0;
            const optionalPrice = (registration.optional_date) ? registration.session?.optional_price || 0 : 0;
            const numberOfStudents = registration.students ? registration.students.length : 1;
            return (basePrice + optionalPrice) * numberOfStudents;
        },
        getStudentsData() {
            // console.log('before',this.currentRegistration);
            if (this.currentRegistration.phone?.nationalNumber) {
                this.studentStore.getExistingStudentsNew(this.currentRegistration).then((response) => {
                    this.currentRegistration.students = [];
                    this.studentStore.students = response.data.students;
                    this.studentStore.parent = response.data.parent;
                    this.studentStore.addStudent = (response.data.parent !== null) ? false : true;
                    this.studentStore.existingStudent = (response.data.parent !== null) ? false : true;
                    this.studentStore.students_count = response.data.students_count;
                    this.currentRegistration.parent = this.studentStore.parent || { id: '', full_name: '', age: '', email: '', stripe_id: '' };
                    // console.log('after',this.currentRegistration);
                });
            }
        },
        phoneInput(number, obj) {
            if (obj) {
            this.currentRegistration.phone = obj;
            }
        },
        handlePhoneBlur() {
            if (this.currentRegistration.phone?.nationalNumber) {
            this.getStudentsData();
            }
        },
        addANewStudent() {
            this.studentStore.addStudent = !this.studentStore.addStudent;
            this.studentStore.existingStudent = !this.studentStore.existingStudent;
            this.resetExistingStudents();

            if (this.studentStore.addStudent) {
                this.currentRegistration.student = {
                    id: '',
                    full_name: '',
                    age: '',
                    email: ''
                };
            }
        },
        addStudentToParentInMultiCamps() {
            // Ensure the student data is valid
            if (!this.currentRegistration.student.full_name || !this.currentRegistration.student.age) {
                alert("Please fill in all required fields for the student.");
                return;
            }

            const phoneValue = this.registrations[0]?.phone || null;

            // console.log('sss',this.currentRegistration.phone == null);
            if(this.currentRegistration.phone == null){
                this.currentRegistration.phone = phoneValue;
            }

            // Send the student data to the backend
            axios.post('/forms/addStudentToParentInMultiCamps', {
                student: this.currentRegistration.student,
                parent: this.currentRegistration.parent,
                phone: phoneValue,
                topic: this.currentRegistration.topic
            })
            .then(response => {
                if (response.data.message === "Student Added Successfully.") {
                    // After successful response, we reset the student input fields
                    // console.log('before currentRegistration',this.currentRegistration);
                    this.currentRegistration.student = { id: '', full_name: '', age: '', email: '' };
                    this.studentStore.addStudent = false;
                    // console.log('after currentRegistration',this.currentRegistration);
                    // Optionally refresh the student list or handle any other post-save actions
                    this.getStudentsData();
                } else {
                    // // In case there's another message from the backend
                }
            })
            .catch(error => {
                console.error('Error adding student:', error);
                alert("An error occurred while adding the student.");
            });
        },
        addStudentToList() {
            if (!this.currentRegistration.students) {
                this.currentRegistration.students = [];
            }

            if (this.currentRegistration.student.full_name && this.currentRegistration.student.age) {
                this.currentRegistration.students.push({ ...this.currentRegistration.student });

                // Reset the student input field
                this.currentRegistration.student = { id: '', full_name: '', age: '', email: '' };
                this.studentStore.addStudent = false;
            }
        },
        resetExistingStudents() {
            this.currentRegistration.student = {id: '', full_name: '', age: '', email: ''};
        },
        addMore() {
            this.addNewRegistration();
            this.step = 0;
            this.bookForm = false;
            this.isModalEnroll = false;
            this.studentStore.existingStudent = false;
            if(this.step == 0){
              this.$nextTick(() => {
                this.$refs.campsData?.scrollIntoView({ behavior: "smooth", block: "start" });
              });
            }
        },
        addNewRegistration() {
            // this.currentRegistration = {
            // phone: null,
            // group: null,
            // topic: null,
            // session: '',
            // type: 'camps',
            // class_type: 'Camps',
            // selected_date: new Date(),
            // location: this.locationsStore.location,
            // optional_date: false,
            // students: [],
            // student: {
            //     id: '',
            //     full_name: '',
            //     age: '',
            //     email: ''
            // },
            // parent: this.registrations.length > 0 ? { ...this.registrations[0].parent } : {
            //     id: '',
            //     full_name: '',
            //     age: '',
            //     email: '',
            //     stripe_id: '',
            // },
            // timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            // };
            // this.registrations.push(this.currentRegistration);

            // Create a deep copy of the current registration
            const newRegistration = JSON.parse(JSON.stringify({
                phone: null,
                group: null,
                topic: null,
                session: '',
                type: 'camps',
                class_type: 'Camps',
                selected_date: new Date(),
                location: this.locationsStore.location,
                optional_date: false,
                students: [],
                student: {
                    id: '',
                    full_name: '',
                    age: '',
                    email: ''
                },
                parent: this.registrations.length > 0 ? { ...this.registrations[0].parent } : {
                    id: '',
                    full_name: '',
                    age: '',
                    email: '',
                    stripe_id: '',
                },
                timezone: "America/Los_Angeles",
            }));

            // Push the new independent registration
            this.registrations.push(newRegistration);

            // Set currentRegistration to the newly added registration
            this.currentRegistration = newRegistration;
        },
        removeRegistration(index) {
            this.registrations.splice(index, 1);
            if (this.registrations.length === 0) {
                this.addNewRegistration();
            }
            else {
                // Set currentRegistration to the last registration in the array
                this.currentRegistration = this.registrations[this.registrations.length - 1];
            }
        },
    //   redirectToCheckout() {
    //     this.step = 4;
    //   },
    //   processPayment() {
    //     // Implement payment processing logic here
    //     console.log('Processing payment...');
    //     this.step = 5;
    //   },
    //   continueShopping() {
    //     this.isModalOpen = false;
    //     this.step = 1;
    //   },
        proceedToCheckout() {
            this.isModalOpen = false;
            this.redirectToCheckout();
        },
        toggleStudent(student) {

            if (!this.currentRegistration.students) {
                this.currentRegistration.students = [];
            }
            const index = this.currentRegistration.students.findIndex(s => s.id === student.id);
            if (index > -1) {
                this.currentRegistration.students.splice(index, 1);
            } else {
                this.currentRegistration.students.push(student);
            }
        },
        calculateAmount() {
            this.totalAmount = 0;
            this.amount = 0;

            if (this.currentRegistration && this.currentRegistration.session) {
            const basePrice = this.currentRegistration.session.price || 0;
            const optionalPrice = this.currentRegistration.optional_date ? (this.currentRegistration.session.optional_price || 0) : 0;
            const numberOfStudents = this.currentRegistration.students ? this.currentRegistration.students.length : 1;
            this.amount = (basePrice + optionalPrice) * numberOfStudents;
            this.totalAmount = this.amount;
            }
        },
        async redirectToCheckout() {
            try {
                let fetchSession = '';
                const fetchClientSecret = async () => {
                const totalAmount = this.registrations.reduce((sum, reg) => sum + this.calculateRegistrationAmount(reg), 0);

                const phoneValue = this.registrations[0]?.phone || null;

                this.registrations = this.registrations.map(registration => ({
                    ...registration, // Keep existing data
                    phone: phoneValue,
                }));

                const response = await axios.post('/forms/newCampsCheckout', {
                    registrations: this.registrations,
                    coupon: this.coupons,
                    type: 'camps',
                    mode: 'camps',
                    totalAmount: totalAmount,
                    allStudents: this.allStudents
                });

                if (response.data.error) {
                    this.stripe_error = response.data.error;
                }

                this.next();
                const clientSecret = response.data.fetchClientSecret;
                fetchSession = response.data.fetchSession;

                // Update parent and student info for all registrations
                this.registrations = this.registrations.map((reg, index) => ({
                        ...reg,
                        students: response.data.registrations && response.data.registrations[index]
                            ? response.data.registrations[index].students || []
                            : []
                }));

                this.coupons.id = response.data.couponId;
                this.coupons.isValid = response.data.isValid;
                return clientSecret;
                };

                const handleComplete = async () => {
                this.checkout.destroy();
                await this.checkStatus(fetchSession);
                };

                if (this.checkout) {
                this.checkout.destroy();
                }

                this.checkout = await stripe.initEmbeddedCheckout({
                fetchClientSecret,
                onComplete: handleComplete
                });
                // Mount Checkout
                this.checkout.mount('#checkout');
            } catch (error) {
                this.stripe_error = error;
            }
        },
        async checkStatus(sessionId) {
            try {
                const response = await axios.post('/forms/check_payment_status', {
                    session_id: sessionId,
                });

                if (response.data.error) {
                    this.stripe_error = response.data.error;
                    return;
                }

                if (response.data.payment_status === 'complete') {
                    // Extract phone value from the first registration
                    const phoneValue = this.registrations[0]?.phone || null;

                    this.serverTotalAmount = response.data.amount_total;

                    // Update all registrations with new payment details + phone value
                    this.registrations = this.registrations.map(registration => ({
                        ...registration, // Keep existing data
                        phone: phoneValue, // Copy phone from first registration
                        totalAmount: response.data.amount_total || 0,
                        amount_subtotal: response.data.amount_subtotal || 0,
                        payment_payload: response.data.payload || {}, // Ensure payment_payload exists
                        payment_id: response.data.payload?.payment_intent || '',
                    }));

                    // Ensure coupons object is properly updated
                    this.coupons.amount_off = response.data.amount_discount || 0;
                    this.coupons.isValid = response.data.isValid || false;

                    // Send updated registrations list to backend
                    const saveResponse = await axios.post('/forms/addMultiCampRegistration', {
                        registrations: this.registrations,
                        coupon: this.coupons,
                        type: 'camps',
                        allStudents: this.allStudents
                    });

                    if (saveResponse.data.message === 'Camp Registrations Successful.') {
                        this.next();
                    }
                }
            } catch (error) {
                console.error('Error checking payment status:', error);
                this.stripe_error = 'Something went wrong while checking payment status.';
            }
        },
        enrollTopicSelected(selectedTopic, selectedGroup) {
            // console.log("Parent method executed with:", selectedTopic, selectedGroup);
            // Call topicSelected and then pass it to next()

            this.next(this.topicSelected(selectedGroup, selectedTopic));
        },
        getSliderStyle() {
            if (!this.locationsStore.locations.length || !this.locationsStore.location) {
                return { left: '4px', width: '0px' };
            }

            const activeIndex = this.locationsStore.locations.findIndex(
                location => location.id === this.locationsStore.location.id
            );

            if (activeIndex === -1) {
                return { left: '4px', width: '0px' };
            }

            const totalButtons = this.locationsStore.locations.length;
            const buttonWidth = `calc(${100 / totalButtons}% - 8px)`;
            const leftPosition = `calc(${(100 / totalButtons) * activeIndex}% + 4px)`;

            return {
                left: leftPosition,
                width: buttonWidth
            };
        },
        toggleAccordion(index) {
            // Vue 3 compatible way to update reactive array
            this.accordionOpen[index] = !this.accordionOpen[index];
        },
    },
    mounted() {
        // Initialize accordion state - first item open by default
        this.$nextTick(() => {
            this.accordionOpen = this.campStore.groups.map((_, index) => index === 0);
        });
    },
    watch: {
        'campStore.groups': {
            handler(newGroups) {
                if (newGroups && newGroups.length > 0) {
                    // Initialize accordion state when groups are loaded
                    this.accordionOpen = newGroups.map((_, index) => index === 0);
                }
            },
            immediate: true
        }
    }
}
</script>
<style>
  input[type='text'],
  input[type='number'],
  input[type='email'],
  input[type='password'],
  input[type='date'] {
    @apply shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full
  }

  input[type='radio'] {
    @apply focus:ring-primary h-4 w-4 text-primary border-gray-300
  }

  input[type='checkbox'] {
    @apply focus:ring-primary h-4 w-4 text-primary border-gray-300 bg-gray-100 rounded
  }

  select {
    @apply shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full
  }

  .btn {
    @apply shadow-primary space-x-2 inline-flex items-center px-20 py-2 text-sm font-medium border border-primary rounded-full hover:text-white hover:bg-primary-darker-1 focus:outline-none
  }

  .btn-disabled {
    @apply disabled:opacity-50 disabled:cursor-not-allowed
  }

  .btn-location {
    @apply disabled:opacity-50 disabled:cursor-not-allowed mx-2 inline-flex items-center justify-around px-5 w-full md:w-52 mx-auto py-2 text-sm rounded-full border border-camps focus:outline-none hover:text-white hover:bg-camps
  }

  .MyCardElement {
    --tw-border-opacity: 1;
    --tw-bg-opacity: 1;
    background-color: rgb(243 244 246 / var(--tw-bg-opacity));
    border-color: rgb(243 244 246 / var(--tw-border-opacity));
    border-radius: 9999px;
    margin-bottom: .5rem;
    margin-top: .5rem;
    padding: .75rem .5rem;
  }

  /* Tailwind's default transition setup for the modal fade effect */
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease-in-out;
  }

  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
  </style>

