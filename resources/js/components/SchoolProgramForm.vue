<template>
  <div id="schoolProgram">
<div class="max-w-5xl mx-auto" >
<form @submit.prevent="sendSchoolProgram">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6 md:px-32 bg-white rounded-3xl shadow-card p-3 m-3 mt-6">
    <div class="md:col-span-2 text-center mb-5">
      <h4 v-html="send_us_your_school_program_details"></h4>
      <div class="-mt-3 text-black-lighter-2">{{fill_school_program_form}}</div>
    </div>
    <div>
      <label class="block text-sm text-gray-700 flex">First Name <span class="text-danger font-bold text-xl">*</span> </label>
     <div class="mt-1">
        <input type="text" placeholder="First Name" v-model="school.first_name" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
      </div>
        <small class="text-danger" v-if="error.errors.first_name">{{error.errors.first_name}}</small>
        <!-- <small v-if="errors && errors.first_name" class="text-red-500 capitalize">{{errors.first_name}}</small> -->
    </div>

    <div>
      <label class="block text-sm text-gray-700 flex">Last Name <span class="text-danger font-bold text-xl">*</span> </label>
      <div class="mt-1">
        <input type="text" placeholder="Last Name" v-model="school.second_name" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
      </div>
      <small class="text-danger" v-if="error.errors.second_name">{{error.errors.second_name}}</small>
        <!-- <small v-if="errors && errors.second_name" class="text-red-500 capitalize">{{errors.second_name}}</small> -->
    </div>

    <div>
      <label class="block text-sm text-gray-700 flex">Mobile Number <span class="text-danger font-bold text-xl">*</span> </label>
      <div class="mt-1">
        <input type="number" placeholder="Mobile Number" v-model="school.mobile"  class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
      </div>
      <small class="text-danger" v-if="error.errors.mobile">{{error.errors.mobile}}</small>
        <!-- <small v-if="errors && errors.mobile" class="text-red-500 capitalize">{{errors.mobile}}</small> -->
    </div>

    <div>
      <label class="block text-sm text-gray-700 flex">Email <span class="text-danger font-bold text-xl">*</span> </label>
      <div class="mt-1">
        <input type="email" placeholder="Email" v-model="school.email" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
      </div>
      <small class="text-danger" v-if="error.errors.email">{{error.errors.email}}</small>
        <!-- <small v-if="errors && errors.email" class="text-red-500 capitalize">{{errors.email}}</small> -->
    </div>

    <div class="md:col-span-2">
      <label class="block text-sm text-gray-700 flex">Organization Name <span class="text-danger font-bold text-xl">*</span> </label>
     <div class="mt-1">
        <input type="text" placeholder="Organization Name" v-model="school.name_of_organisation" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
      </div>
      <small class="text-danger" v-if="error.errors.name_of_organisation">{{error.errors.name_of_organisation}}</small>
        <!-- <small v-if="errors && errors.name_of_organisation" class="text-red-500 capitalize">{{errors.name_of_organisation}}</small> -->
    </div>

    <div class="md:col-span-2">
      <label class="block text-sm text-gray-700 flex">Program Type <span class="text-danger font-bold text-xl">*</span></label>
     <div class="mt-1">
       <select v-model="school.program_interested_in" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
         <option selected disabled value="">Select Option</option>
         <option value="Coding Class - Live Instructor">Coding Class - Live Instructor </option>
         <option value="Professional Development & Training">Professional Development & Training  </option>
       </select>
     </div>
     <small class="text-danger" v-if="error.errors.program_interested_in">{{error.errors.program_interested_in}}</small>
        <!-- <small v-if="errors && errors.program_interested_in" class="text-red-500 capitalize">{{errors.name_of_organisation}}</small> -->
    </div>

    <div class="md:col-span-2">
      <label class="block text-sm text-gray-700 flex">Tell us about your program request: <span class="text-danger font-bold text-xl">*</span> </label>
      <div class="mt-1">
        <textarea rows="5" placeholder="Tell us about your school program request" v-model="school.description" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-3xl"></textarea>
      </div>
        <small class="text-danger" v-if="error.errors.description">{{error.errors.description}}</small>
        <!-- <small v-if="errors && errors.description" class="text-red-500 capitalize">{{errors.description}}</small> -->
    </div>

    <div class="md:col-span-2 text-center">
      <!-- <button type="submit" class="w-full md:w-80 shadow-primary inline-flex items-center justify-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none">
        Send
      </button> -->
      <button type="submit" :disabled="buttonLoader" class="disabled:opacity-50 disabled:cursor-not-allowed shadow-primary space-x-2 inline-flex items-center px-20 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">
        <span>Next</span>
        <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
      </button>
    </div>

   </div>
  </form>
</div>
</div>
<loader></loader>
<Notification></Notification>
</template>

<script>
import { useErrorStore } from "../store/errorsStore";
export default {
    setup(){
        const error = useErrorStore()
        return {
            error
        }
    },
    props : ['fill_school_program_form','send_us_your_school_program_details'],
    data(){
        return {
        school : {
            first_name : '',
            second_name : '',
            mobile : '',
            email : '',
            description : '',
            name_of_organisation : '',
            program_interested_in : ''
        }
        }
    },
    computed : {
    },
  methods : {
    reset()
    {
        this.school = {
          first_name : '',
          second_name : '',
          mobile : '',
          email : '',
          description : '',
          name_of_organisation : '',
          program_interested_in : ''
        }
    },
    sendSchoolProgram()
    {
      let _this = this;
      axios({
        method: "POST",
        url: "/web/school-program/store",
        data: _this.school,
      })
        .then((response) => {
          _this.reset();
        }).catch(error => {
          console.log(error.response)
      });
    }
  }
}
</script>

