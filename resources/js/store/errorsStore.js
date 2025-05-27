import { defineStore } from 'pinia'

export const useErrorStore = defineStore({
    id : 'errorStoreId',
    state : () => ({
        errors : {}
    }),

    actions : {
        set(errors){
            this.errors = errors;
        }
    }
})
