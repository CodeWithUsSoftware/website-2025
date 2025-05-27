import { defineStore } from 'pinia'

export const useTopics = defineStore({
    id : 'topicsStoreId',
    state : () => ({
        topics : [],
        topicSpotlights:[]
       
    }),

    actions : {
        fetchTopics(){
            axios({
                method: "get",
                url: "/web/getTopics",
            }).then(response => {
                this.topics = response.data.topics
            })
        },
        fetchTopicsSpotlights(){
            axios({
                method: "get",
                url: "/web/getTopicsAndSpotlights",
            }).then(response => {
                this.topicSpotlights = response.data.data
            })
        },
    }
})
