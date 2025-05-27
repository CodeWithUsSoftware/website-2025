export default {
    async mounted() {
        console.log('mounting recaptcha...')
        try {
          await this.$recaptchaLoaded()
          console.log('mounting recaptcha success...')
        } catch (e) {
          console.error('mounting recaptcha error...', e);
        }
    },
    methods: {
        verifyCaptcha() {
            return new Promise((resolve, reject) => {
              try {
                const token = this.$recaptcha('login')
                // const token = await this.$recaptcha.getResponse()
                console.log('ReCaptcha token:', token)
                // send token to server alongside your form data
                resolve();
                // at the end you need to reset recaptcha
                //this.$recaptcha.reset()
              } catch (error) {
                console.log('ReCaptcha error:', error)
                reject(error)
              }
            });

          },
    },

}
