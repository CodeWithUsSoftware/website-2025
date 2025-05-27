import { defineStore } from 'pinia'

export const useNotificationStore = defineStore({
    id : 'notificationStoreId',
    state : () => ({
        message : '',
        success : true
    }),

    actions : {
        setMessage(payload){
            this.message = payload;
            setTimeout(() => {
                this.message = '';
            }, 5000)
        }
    }
})
