import { defineStore } from 'pinia'

export const useLoaderStore = defineStore({
    id : 'loaderStoreId',
    state : () => ({
        loader : false,
        buttonloader : false
    }),

    getters : {

    },

    actions : {
        setLoader(payload){
            this.loader = payload
        },
        buttonLoader(payload){
          this.buttonloader = payload
      }
    }
})
