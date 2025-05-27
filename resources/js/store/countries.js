import { defineStore } from 'pinia'

export const useCountriesStore = defineStore({
    id : 'countriesId',
    state : () => ({
        countries : [],
        isEditable : false,
        showForm : false,

    }),

    actions : {
        get(){
            axios({
                method: "get",
                url: '/web/getCurrentCountry?timezone='+Intl.DateTimeFormat().resolvedOptions().timeZone,
            }).then(response => {
                this.countries = response.data.country
            })
        },
        getCurrentCountryById(timezone_id){
            axios({
                method: "get",
                url: '/web/getCurrentCountryById?id='+timezone_id,
            }).then(response => {
                this.countries = response.data.country
            })
        },
    }
})
