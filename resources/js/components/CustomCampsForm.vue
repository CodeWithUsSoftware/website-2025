<template>
<form @submit.prevent="sendCustomerSignUpMail">
  <div class="max-w-4xl mx-auto ">
    <div class="bg-white rounded-3xl shadow-card p-10 mx-3 md:mx-0">
    <div class="text-center mb-5">
      <h4>Custom Camps Request</h4>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
      <div>
        <label class="block text-sm text-gray-700 flex">First Name<span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="text" required placeholder="First Name" v-model="custom_request.first_name" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
          <small v-if="errors.errors && errors.errors.first_name" class="text-red-500 capitalize">{{errors.errors.first_name}}</small>
        </div>
      </div>

      <div>
        <label class="block text-sm text-gray-700 flex">Last Name<span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="text" required placeholder="Last Name"  v-model="custom_request.second_name" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
          <small v-if="errors.errors && errors.errors.second_name" class="text-red-500 capitalize">{{errors.errors.second_name}}</small>
        </div>
      </div>

      <div>
        <label class="block text-sm text-gray-700 flex">Mobile Number<span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="number" required placeholder="Mobile Number" v-model="custom_request.mobile"  class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
          <small v-if="errors.errors && errors.errors.mobile" class="text-red-500 capitalize">{{errors.errors.mobile}}</small>
        </div>
      </div>

      <div>
        <label class="block text-sm text-gray-700 flex">Email<span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <input type="email" required placeholder="Email" v-model="custom_request.email" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
          <small v-if="errors.errors && errors.errors.email" class="text-red-500 capitalize">{{errors.errors.email}}</small>
        </div>
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm text-gray-700 flex">Tell us about your request:<span class="text-danger font-bold text-xl">*</span></label>
        <div class="mt-1">
          <textarea rows="5" required v-model="custom_request.description" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-3xl"></textarea>
          <small v-if="errors && errors.errors.description" class="text-red-500 capitalize">{{errors.errors.description}}</small>
        </div>
      </div>

      <div class="md:col-span-2 text-center">
        <button type="submit"  class="w-full md:w-80 shadow-camps inline-flex items-center justify-center px-4 py-2 text-sm border border-camps rounded-full text-white bg-camps hover:bg-camps-darker-1 focus:outline-none">
          <span>Send</span>
          <!-- <Loader  variants="animate-spin" /> -->
        </button>
      </div>

    </div>
  </div>
  </div>
</form>
<loader></loader>
<Notification></Notification>
</template>
<script>
import recaptcha from "../../../mixins/recaptcha";
import { useErrorStore } from "../store/errorsStore";
import { useLoaderStore } from "../store/loaderStore";
import Loader from './Loader.vue'

export default {
  mixins : [recaptcha, Loader],
    setup(){
        const errors = useErrorStore()
        const loader = useLoaderStore()
        return {
           errors, loader
        }
    },
    data(){
        return {
            custom_request : {}
        }
    },
    methods:{
       sendCustomerSignUpMail(){
        this.verifyCaptcha().then(res => {
          let _this = this;
          axios({
            method: "POST",
            url: "/web/send-custom-request-email",
            data: _this.custom_request,
          })
            .then((response) => {
              _this.custom_request = {};
            });
        }).catch(err => {

        })
        }
    },
    beforeDestroy() {
      this.$recaptcha.destroy()
    }
}
</script>
