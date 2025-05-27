<template>
<form @submit.prevent="sendPartnerMail" class="px-3 md:px-0">
  <div class="md:px-32 bg-white rounded-3xl shadow-card max-w-5xl mx-auto p-3 m-3 mt-6">
  <div class="text-center mb-5">
    <h4 v-html="send_us_your_partnership_idea"></h4>
    <p>{{fill_partners_form}}</p>
  </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-y-8 gap-x-4">
      <div>
        <label class="block text-sm text-gray-700 flex">First Name<span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="text" placeholder="First Name" v-model="partner.first_name" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
        </div>
        <small class="text-danger" v-if="error.errors.first_name">{{error.errors.first_name}}</small>
        <!-- <small v-if="errors && errors.first_name" class="text-red-500 capitalize">{{errors.first_name}}</small> -->
      </div>
      <div>
        <label class="block text-sm text-gray-700 flex">Second Name <span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="text" placeholder="Second Name" v-model="partner.second_name" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
        </div>
        <small class="text-danger" v-if="error.errors.second_name">{{error.errors.second_name}}</small>
        <!-- <small v-if="errors && errors.second_name" class="text-red-500 capitalize">{{errors.second_name}}</small> -->
      </div>
      <div>
        <label class="block text-sm text-gray-700 flex">Mobile Number <span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="number" placeholder="Mobile Number" v-model="partner.mobile"  class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
        </div>
        <small class="text-danger" v-if="error.errors.mobile">{{error.errors.mobile}}</small>
        <!-- <small v-if="errors && errors.mobile" class="text-red-500 capitalize">{{errors.mobile}}</small> -->
      </div>
      <div>
        <label class="block text-sm text-gray-700 flex">Email <span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="email" placeholder="Email" v-model="partner.email" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
        </div>
        <small class="text-danger" v-if="error.errors.email">{{error.errors.email}}</small>
        <!-- <small v-if="errors && errors.email" class="text-red-500 capitalize">{{errors.email}}</small> -->
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm text-gray-700">Tell us about your partnership request: <span class="text-primary">*</span></label>
        <div class="mt-1">
          <textarea rows="5" placeholder="Tell us about your partnership request" v-model="partner.description" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-3xl"></textarea>
        </div>
        <small class="text-danger" v-if="error.errors.description">{{error.errors.description}}</small>
        <!-- <small v-if="errors && errors.description" class="text-red-500 capitalize">{{errors.description}}</small> -->
      </div>
      <div class="md:col-span-2 text-center">
        <button :disabled="buttonLoader" type="submit" class="disabled:opacity-50 disabled:cursor-not-allowed w-full md:w-52 shadow-primary inline-flex items-center justify-center px-10 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">
          <span>{{!buttonLoader ? 'Send' : 'Sending...'}}</span>
          <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
        </button>
      </div>

    </div>


   </div>
  </form>
  <loader></loader>
<Notification></Notification>
</template>

<script>
import { useErrorStore } from "../store/errorsStore";

export default {
  props: ['fill_partners_form','send_us_your_partnership_idea' ],
  setup(){
        const error = useErrorStore()
        return {
            error
        }
    },
  data(){
    return {
      partner : {
        first_name : '',
        second_name : '',
        mobile : '',
        email : '',
        description : ''
      }
    }
  },
  methods : {
     sendPartnerMail()
    {
        let _this = this;
        axios({
          method: "POST",
          url: "/web/partner/store",
          data: _this.partner,
        })
        .then((response) => {
        _this.partner = {
        first_name : '',
        second_name : '',
        mobile : '',
        email : '',
        description : ''
        }
        }).catch(error => {
          console.log(error.response)
      });
    }
  }
}
</script>

