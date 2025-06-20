<template>
  <div id="schoolProgramMobile" class="min-h-screen bg-gray-50">
    <div class="px-4 py-6">
      <form @submit.prevent="sendSchoolProgram">
        <div class="bg-white rounded-2xl shadow-lg p-6 space-y-6">
          <!-- Header -->
          <div class="text-center mb-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-2" v-html="send_us_your_school_program_details"></h3>
            <p class="text-sm text-gray-600">{{ fill_school_program_form }}</p>
          </div>

          <!-- First Name -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              First Name <span class="text-red-500 text-lg">*</span>
            </label>
            <input
              type="text"
              placeholder="Enter your first name"
              v-model="school.first_name"
              class="w-full px-4 py-3 text-base border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
            >
            <p class="text-red-500 text-sm" v-if="error.errors.first_name">{{ error.errors.first_name }}</p>
          </div>

          <!-- Last Name -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Last Name <span class="text-red-500 text-lg">*</span>
            </label>
            <input
              type="text"
              placeholder="Enter your last name"
              v-model="school.second_name"
              class="w-full px-4 py-3 text-base border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
            >
            <p class="text-red-500 text-sm" v-if="error.errors.second_name">{{ error.errors.second_name }}</p>
          </div>

          <!-- Mobile Number -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Mobile Number <span class="text-red-500 text-lg">*</span>
            </label>
            <input
              type="tel"
              placeholder="Enter your mobile number"
              v-model="school.mobile"
              class="w-full px-4 py-3 text-base border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
            >
            <p class="text-red-500 text-sm" v-if="error.errors.mobile">{{ error.errors.mobile }}</p>
          </div>

          <!-- Email -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Email <span class="text-red-500 text-lg">*</span>
            </label>
            <input
              type="email"
              placeholder="Enter your email address"
              v-model="school.email"
              class="w-full px-4 py-3 text-base border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
            >
            <p class="text-red-500 text-sm" v-if="error.errors.email">{{ error.errors.email }}</p>
          </div>

          <!-- Organization Name -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Organization Name <span class="text-red-500 text-lg">*</span>
            </label>
            <input
              type="text"
              placeholder="Enter organization name"
              v-model="school.name_of_organisation"
              class="w-full px-4 py-3 text-base border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
            >
            <p class="text-red-500 text-sm" v-if="error.errors.name_of_organisation">{{ error.errors.name_of_organisation }}</p>
          </div>

          <!-- Program Type -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Program Type <span class="text-red-500 text-lg">*</span>
            </label>
            <select
              v-model="school.program_interested_in"
              class="w-full px-4 py-3 text-base border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors appearance-none"
            >
              <option selected disabled value="">Select Program Type</option>
              <option value="Coding Class - Live Instructor">Coding Class - Live Instructor</option>
              <option value="Professional Development & Training">Professional Development & Training</option>
            </select>
            <!-- Custom dropdown arrow -->
            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
            <p class="text-red-500 text-sm" v-if="error.errors.program_interested_in">{{ error.errors.program_interested_in }}</p>
          </div>

          <!-- Description -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Tell us about your program request <span class="text-red-500 text-lg">*</span>
            </label>
            <textarea
              rows="4"
              placeholder="Describe your school program request in detail..."
              v-model="school.description"
              class="w-full px-4 py-3 text-base border border-gray-200 rounded-xl bg-gray-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none"
            ></textarea>
            <p class="text-red-500 text-sm" v-if="error.errors.description">{{ error.errors.description }}</p>
          </div>

          <!-- Submit Button -->
          <div class="pt-4">
            <button
              type="submit"
              :disabled="buttonLoader || isFormEmpty"
              class="w-full py-4 px-6 text-base font-semibold text-white bg-primary rounded-xl shadow-lg hover:bg-primary-darker-1 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 transform active:scale-95"
            >
              <span v-if="!buttonLoader">Next</span>
              <div v-else class="flex items-center justify-center space-x-2">
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Processing...</span>
              </div>
            </button>
          </div>

          <!-- Progress Indicator (Optional) -->
          <div class="flex justify-center pt-2">
            <div class="flex space-x-2">
              <div class="w-2 h-2 bg-primary rounded-full"></div>
              <div class="w-2 h-2 bg-gray-200 rounded-full"></div>
              <div class="w-2 h-2 bg-gray-200 rounded-full"></div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Bottom Safe Area for iOS -->
    <div class="h-6 bg-gray-50"></div>

    <loader></loader>
    <Notification></Notification>
  </div>
</template>

<script>
import { useErrorStore } from "../store/errorsStore";

export default {
  name: 'SchoolProgramFormMobile',
  setup() {
    const error = useErrorStore();
    return {
      error
    };
  },
  props: ['fill_school_program_form', 'send_us_your_school_program_details'],
  data() {
    return {
      buttonLoader: false,
      school: {
        first_name: '',
        second_name: '',
        mobile: '',
        email: '',
        description: '',
        name_of_organisation: '',
        program_interested_in: ''
      }
    };
  },
  computed: {
    isFormEmpty() {
      return !this.school.first_name ||
             !this.school.second_name ||
             !this.school.mobile ||
             !this.school.email ||
             !this.school.name_of_organisation ||
             !this.school.program_interested_in ||
             !this.school.description;
    }
  },
  methods: {
    reset() {
      this.school = {
        first_name: '',
        second_name: '',
        mobile: '',
        email: '',
        description: '',
        name_of_organisation: '',
        program_interested_in: ''
      };
    },
    sendSchoolProgram() {
      if (this.isFormEmpty) {
        return;
      }

      this.buttonLoader = true;
      let _this = this;

      axios({
        method: "POST",
        url: "/web/school-program/store",
        data: _this.school,
      })
      .then((response) => {
        _this.reset();
        _this.buttonLoader = false;
        // Add success feedback here if needed
      })
      .catch(error => {
        console.log(error.response);
        _this.buttonLoader = false;
      });
    }
  },
  mounted() {
    // Auto-focus first field on mobile for better UX
    if (window.innerWidth <= 768) {
      setTimeout(() => {
        const firstInput = this.$el.querySelector('input[type="text"]');
        if (firstInput) {
          firstInput.focus();
        }
      }, 300);
    }
  }
};
</script>

<style scoped>
/* Mobile-specific styles */
@media (max-width: 768px) {
  input, select, textarea {
    font-size: 16px; /* Prevents zoom on iOS */
  }
}

/* Custom select dropdown positioning */
.relative {
  position: relative;
}

/* Smooth transitions for better mobile experience */
input:focus, select:focus, textarea:focus {
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Button pressed state for mobile */
button:active {
  transform: scale(0.98);
}

/* Loading state for better feedback */
.animate-spin {
  animation: spin 1s linear infinite;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
