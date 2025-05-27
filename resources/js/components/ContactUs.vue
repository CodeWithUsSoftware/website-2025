<template>
  <form @submit.prevent="sendSignUpMail">
    <div class="max-w-4xl mx-auto ">
      <div class="bg-white rounded-3xl shadow-card p-10 mx-3 md:mx-0">
        <div class="text-center mb-5">
          <h4>Contact us</h4>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm text-gray-700 flex">First Name<span class="text-danger font-bold text-xl">*</span></label>
            <div class="mt-1">
              <input required type="text" placeholder="First Name" v-model="contact.first_name" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
              <small v-if="errors && errors.first_name" class="text-red-500 capitalize">{{errors.first_name[0]}}</small>
            </div>
          </div>

          <div>
            <label class="block text-sm text-gray-700 flex">Last Name<span class="text-danger font-bold text-xl">*</span></label>
            <div class="mt-1">
              <input required type="text" placeholder="Last Name" v-model="contact.last_name"  class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
              <small v-if="errors && errors.second_name" class="text-red-500 capitalize">{{errors.second_name[0]}}</small>
            </div>
          </div>

          <div>
            <label class="block text-sm text-gray-700 flex">Mobile Number<span class="text-danger font-bold text-xl">*</span></label>
            <div class="mt-1">
              <input required type="number" placeholder="Mobile Number" v-model="contact.phone_number" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
              <small v-if="errors && errors.mobile" class="text-red-500 capitalize">{{errors.mobile[0]}}</small>
            </div>
          </div>

          <div>
            <label class="block text-sm text-gray-700 flex">Email<span class="text-danger font-bold text-xl">*</span></label>
            <div class="mt-1">
              <input required type="email" placeholder="Email" v-model="contact.email" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
              <small v-if="errors && errors.email" class="text-red-500 capitalize">{{errors.email[0]}}</small>
            </div>
          </div>

          <div class="block text-sm text-gray-700 flex">Select Options<span class="text-danger font-bold text-xl">*</span></div>

          <div class="grid grid-cols-1 md:grid-cols-3 md:col-span-2 gap-2">
            <div class="flex px-2 space-x-2" v-for="option in options">
              <input id="option" v-model="contact.reason" :value="option" type="checkbox" class="shadow-sm focus:ring-camps focus:border-camps block w-6 h-6  sm:text-sm border-gray-100 bg-gray-100 ">
              <label class="text-black-lighter-2">{{ option }}</label>
            </div>
          </div>

<!--TextArea-->
          <div class="md:col-span-2">
            <label class="block text-sm text-gray-700 flex">Tell us about your request:<span class="text-danger font-bold text-xl">*</span></label>
            <div class="mt-1">
              <textarea required rows="5" v-model="contact.description" class="shadow-sm focus:ring-camps focus:border-camps block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-3xl"></textarea>
              <small v-if="errors && errors.description" class="text-red-500 capitalize">{{errors.description[0]}}</small>
            </div>
          </div>

          <div class="md:col-span-2 text-center">
            <button type="submit" :disabled="buttonLoader || !contact.reason.length" class="disabled:opacity-50 disabled:cursor-not-allowed w-full md:w-80 shadow-camps inline-flex items-center justify-center px-4 py-2 text-sm border border-camps rounded-full text-white bg-camps hover:bg-camps-darker-1 focus:outline-none">
              <span>Send</span>
              <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
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
export default {
    setup(){
        return {
        }
    },
    data(){
    return {
      contact : {
        first_name : '',
        last_name : '',
        phone_number : '',
        email : '',
        description : '',
        reason : [],
        type : 'contact'
      },
      options : [
        "Coding Camp", "Coding Class", "Corporate Program", "Home School Program", "Scholarship", "School Program", "General"
      ]
    }
  },
    created() {

    },
    methods:{
    sendSignUpMail(){
      let _this = this;
      axios({
        method: "POST",
        url: "/web/save-contact-request",
        data: _this.contact,
      })
        .then((response) => {
          _this.contact = {
              first_name : '',
              last_name : '',
              phone_number : '',
              email : '',
              description : '',
              reason : [],
              type : 'contact'
          }
        }).catch(error => {
          console.log(error.response)
      });
    }
  }
}
</script>
