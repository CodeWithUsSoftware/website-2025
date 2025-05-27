<template>
<div class="px-3 md:px-0">
  <div id="form" class="bg-white shadow-card rounded-3xl max-w-4xl mx-auto p-3 md:px-16">
    <transition :name="slide_animation">
      <form v-if="step === 1" @submit.prevent="store">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 space-y-1">
          <div class="md:col-span-2 text-center">
            <h4>Setup an <span class="text-primary">interview to work at Code With Us</span>.</h4>
            <p class="-mt-3">Limited spots available</p>
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">Full Name <span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <input type="text" placeholder="Name" v-model="applicant.name" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
            </div>
            <small v-if="error.errors.name" class="text-red-500">{{error.errors.name}}</small>
            <!-- <small v-if="errors && errors.name" class="text-red-500">{{errors.name}}</small> -->
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">Email <span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <input type="email" placeholder="Email" v-model="applicant.email" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
            </div>
            <small v-if="error.errors.email" class="text-red-500">{{error.errors.email}}</small>
            <!-- <small v-if="errors && errors.email" class="text-red-500">{{errors.email}}</small> -->
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">Phone Number <span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <vue-tel-input
              v-bind="bindProps"
              :preferredCountries="preferredCountries"
              :autoFormat="false"
              v-model="applicant.phone_number"
              @input="phoneInput"
              :defaultCountry="countries.countries.character_code">
              </vue-tel-input>
            </div>
            <small v-if="error.errors.phone_number" class="text-red-500">{{error.errors.phone_number}}</small>
            <!-- <small v-if="errors && errors.phone_number" class="text-red-500">{{errors.phone_number}}</small> -->
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">City/Zip <span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <input type="text" placeholder="City/Zip" v-model="applicant.address" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
            </div>
            <small v-if="error.errors.address" class="text-red-500">{{error.errors.address}}</small>
            <!-- <small v-if="errors && errors.address" class="text-red-500">{{errors.address}}</small> -->
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">Education <span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <select v-model="applicant.education" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                <option value="" selected disabled>Education</option>
                <option value="high_school">High School</option>
                <option value="currently_in_college">Currently in College</option>
                <option value="bachelor">Bachelor's</option>
                <option value="master">Master's</option>
                <option value="master_plus">Master's +</option>
              </select>
            </div>
            <small v-if="error.errors.education" class="text-red-500">{{error.errors.education}}</small>
            <!-- <small v-if="errors && errors.education" class="text-red-500">{{errors.education}}</small> -->
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">Years of Experience<span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <input type="number" placeholder="Years of Experience" v-model="applicant.experience" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
            </div>
            <small v-if="error.errors.experience" class="text-red-500">{{error.errors.experience}}</small>
            <!-- <small v-if="errors && errors.experience" class="text-red-500">{{errors.experience}}</small> -->
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">When can you start working? <span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <input type="date" v-model="applicant.availability" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
            </div>
            <small v-if="error.errors.availability" class="text-red-500">{{error.errors.availability}}</small>
            <!-- <small v-if="errors && errors.availability" class="text-red-500">{{errors.availability}}</small> -->
          </div>
          <div>
            <label class="block text-sm text-gray-700 flex">DOB <span class="text-danger font-bold text-xl">*</span> </label>
            <div class="mt-1">
              <input type="date" v-model="applicant.dob"  class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
            </div>
            <small v-if="error.errors.dob" class="text-red-500">{{error.errors.dob}}</small>
            <!-- <small v-if="errors && errors.dob" class="text-red-500">{{errors.dob}}</small> -->
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm text-gray-700 flex">How did you hear about us? <span class="text-danger font-bold text-xl">*</span></label>
            <div class="mt-1">
              <input type="text" placeholder="How did you hear about us? Google, Friend, etc" v-model="applicant.referral" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
            </div>
            <small v-if="error.errors.referral" class="text-red-500">{{error.errors.referral}}</small>
            <!-- <small v-if="errors && errors.referral" class="text-red-500">{{errors.referral}}</small> -->
          </div>

          <div class="md:col-span-2">
            <label class="block text-sm text-gray-700 flex">Please let us know your expectations <span class="text-danger font-bold text-xl">*</span></label>
            <div class="mt-1">
              <textarea placeholder="Please let us know your expectations" rows="5" v-model="applicant.notes" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-3xl"></textarea>
            </div>
            <small v-if="error.errors.notes" class="text-red-500">{{error.errors.notes}}</small>
            <!-- <small v-if="errors && errors.notes" class="text-red-500">{{errors.notes}}</small> -->
          </div>

          <div class="text-center md:text-left">
            <input type="button" class="w-52 cursor-pointer shadow-primary inline-flex items-center justify-center px-4 py-2 text-sm border border-secondary rounded-full text-white bg-secondary hover:bg-secondary focus:outline-none" @click="selectFileToUpload" value="Resume Upload +"/>
            <input id="file-input" type="file" @change="selectFile" style="display: none;">
            <small v-if="fileTypeError" class="text-red-500"><br>{{fileTypeErrorMessage}}</small>
            <small class="text-success"><br>{{file_name}}</small>
          </div>

          <div class="text-center md:text-right">
            <button type="submit" class="w-52 shadow-primary inline-flex items-center justify-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none">
              <span> Submit</span>
              <!-- <Loader v-if="buttonLoader" variants="animate-spin" /> -->
            </button>
          </div>

        </div>
      </form>
    </transition>
    <transition :name="slide_animation">
      <section class="text-center py-16" v-if="step === 2">
        <h5 class="text-primary">Thankyou!</h5>
        <p>You successfully submit your application.</p>
      </section>
    </transition>
  </div>
</div>
<loader></loader>
<Notification></Notification>
</template>

<script>
import { useCountriesStore } from "../store/countries";
import { useErrorStore } from "../store/errorsStore";
export default {
components: {},
setup(){
        const countries = useCountriesStore()
        const error = useErrorStore()
        return {
            countries, error
        }
    },
  data(){
    return {
            step : 1,
            slide_animation: '',
            loading : false,
            applicant : {
                name : '',
                country_id : '',
                phone_number : '',
                email : '',
                dob : '',
                referral : '',
                availability : '',
                experience : '',
                address : '',
                education : '',
                notes: ''
            },
            resume : '',
            bindProps: {
                inputOptions: {
                    required: true,
                    styleClasses: '',
                    placeholder : 'Phone Number',
                    type : ''
                }
            },
            preferredCountries: ['US', 'GB', 'CA', 'CN', 'IN'],
            //error : '',
            success : '',
            statuses : [],
            pdf : '',
            phone_number : '',
            file_name: '',
            validFileTypes : ['doc', 'docx', 'pdf', 'vnd.openxmlformats-officedocument.wordprocessingml.document'],
            fileTypeError : true,
            fileTypeErrorMessage : 'Supported file types are doc, docx and pdf'
    }
  },
  watch: {
    step(newVal, oldVal) {
      if (newVal > oldVal) {
        this.slide_animation = 'slide-fade'
      } else {
        this.slide_animation = 'slide-fade-reverse'
      }
    },
  },
  computed : {
    uploadedFile(){
        return this.applicant.file;
    }
  },
  created() {
    this.countries.get();
  },
  methods : {
        selectFileToUpload(event){
          document.querySelector('#file-input').click();
        },
        validateFileType(type){
            if(type){
                let t = type.split('/')[1]
                if(t && t !== 'undefined'){
                    return this.validFileTypes.includes(t);
                } else {
                    return 0
                }
            } else{
                return 0;
            }

        },
        selectFile(e){
            let fileReader = new FileReader();
            this.file_name = e.target.files[0].name;
            let isValid = this.validateFileType((e.target.files[0].type))
            if(!isValid){
                this.fileTypeError = true
            } else {
                this.fileTypeError = false
            }
            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = (e) => {
                this.applicant.file = e.target.result
            }
        },
         store(){
           this.loading = true;
           this.applicant.pdf = this.pdf;
           //console.log(this.applicant);
            axios.post('/web/applicant/store', this.applicant)
            .then(response => {
                this.step = 2
                this.loading = false;
                window.location='#form';
            }).catch(error => {
                this.loading = false;
            });
        },
        reset()
        {
            this.applicant = {
                name : 'Ahmad',
                country_id : '',
                phone_number : '7081708171',
                email : 'ahmad@codewithus.com',
                dob : '2001-06-1',
                referral : 'google',
                availability : '',
                experience : 1,
                address : 'Lucknow',
                education : 'master_plus',
                notes: ''
        }
      },
      phoneInput(number, obj)
        {
            if(obj)
            {
            this.calling_code = obj.countryCallingCode
            this.applicant.phone_number = number
            console.log(number,this.calling_code);
            this.applicant.country_id = this.calling_code;
            }
        },
    }
}
</script>
