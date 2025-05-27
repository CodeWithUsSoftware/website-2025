import { defineStore } from 'pinia'

export const useAuthStore = defineStore({
    id : 'authStoreId',
    state : () => ({
        isLoggedIn: JSON.parse(localStorage.getItem("isLoggedIn")) || false,
        auth: JSON.parse(localStorage.getItem("auth")) || null,
        token: localStorage.getItem("token") || null,
        impersonate : JSON.parse(localStorage.getItem("impersonate")) || null,
        staging : JSON.parse(localStorage.getItem("staging")) || false,
        holidays_for_scheduling : [],
        // Trying to get the tenant details for dynamic folder structure
        // tenant_details : JSON.parse(localStorage.getItem("tenant_details")) || null,

        // local development
        // base_url: "http://localhost:8000",
        // api_url: "/api",
        // image_url : 'http://localhost:8000',

        // productions
        // base_url: "https://v3.codewithus.com",
        // api_url: "/api",
        // image_url: "https://v3.codewithus.com",

        logging_user : {
            id : '',
            email : '',
            country:'',
            phone:'',
            full_name : '',
            password: '',
            device_name : 'web'
        },

        reset_userDetails:{
                    token:'',
                    code:'',
                    phone:''
        },
        resetpassword:'',
        password_status:null,
        permissions : JSON.parse(localStorage.getItem("permissions")) || '',
        role_name : null,
        roles : null,
        users_list : [],
        email : '',
        phone:'',
        country:'',
        time_zone : 'America/Los_Angeles',
        portal_language_lines : [],
        reset_loader :false
    }),

    actions : {
        backendInitData() {
            if(this.auth) {
                axios({
                    method: "POST",
                    url: "/api/backendInitData/" + this.auth.id
                }).then(response => {
                    this.auth = response.data.user
                    localStorage.setItem("auth", JSON.stringify(this.auth));
                    localStorage.setItem("isLoggedIn", true);
                    this.permissions = response.data.permissions
                    this.role_name = response.data.role_name
                    this.roles = response.data.roles
                    this.staging = response.data.staging

                    // Trying to get the tenant details for dynamic folder structure
                    // this.tenant_details = response.data.tenant_details

                    localStorage.setItem("staging", response.data.staging);
                    this.portal_language_lines = response.data.portal_language_lines
                    localStorage.setItem("role_name", this.role_name);
                    localStorage.setItem("permissions", JSON.stringify(this.permissions));
                    localStorage.setItem("portal_language_lines", JSON.stringify(this.portal_language_lines));

                    // Trying to get the tenant details for dynamic folder structure
                    // localStorage.setItem("tenant_details", JSON.stringify(this.tenant_details));
                }).catch(error => {
                    console.log(error);
                })
            }
        },
        setUser(user){
            this.userwithaPhoneNo = user
            this.logging_user.id = user.id
            this.logging_user.full_name = user.full_name
        },
        login(password){
            return new Promise((resolve, reject) =>{
                this.logging_user.password = password
                axios({
                    method: "POST",
                    url: "/api/tokens/create",
                    data: this.logging_user,
                })
                    .then(response => {
                        this.token = response.data.access_token
                        this.auth = response.data.user
                        this.permissions = response.data.permissions
                        this.role_name = response.data.role_name
                        this.roles = response.data.roles
                        localStorage.setItem("token", this.token);
                        localStorage.setItem("auth", JSON.stringify(this.auth));
                        localStorage.setItem("isLoggedIn", true);
                        localStorage.setItem("role_name", this.role_name);
                        localStorage.setItem("permissions", JSON.stringify(this.permissions));
                        resolve(response)
                    }).catch(error => {
                    console.log(error);
                    reject(error)
                })
            })
        },
    }
})
