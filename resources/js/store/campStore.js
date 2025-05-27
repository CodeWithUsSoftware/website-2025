import { defineStore } from 'pinia'

export const useCampStore = defineStore({
    id : 'campId',
    state : () => ({
        group : '',
        groups : [],
        groups_count : 0,
        group_sessions : [],
    }),

    actions : {
        fetchFormsGroupsTopics(payload){
            this.groups = [];
            axios({
                method: "post",
                url: "/forms/getGroupsTopics",
                data: payload,
                headers: {'timezone': Intl.DateTimeFormat().resolvedOptions().timeZone}
            }).then(response => {
                this.groups = response.data.groups
                this.groups_count = response.data.count
            })
        },
        fetchFormsGroupsSessions(payload){
            this.groups = [];
            axios({
                method: "post",
                url: "/forms/getGroupSessions",
                data: payload
            }).then(response => {
                this.group = response.data.group
                this.group_sessions = response.data.sessions
            })
        }
    }
})
