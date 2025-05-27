import { defineStore } from 'pinia'
import { useCampStore } from "./campStore";

export const useLocationsStore = defineStore({
    id : 'locationsId',
    state : () => ({
        locations : [],
        location : null,
        school_location:[]
    }),

    actions : {
        fetchLocations(payload){
            axios({
                method: "post",
                url: "/web/getLocations",
                data: payload
            }).then(response => {
                this.locations = response.data.locations
            })
        },
        fetchSchoolLocation(payload){
            axios({
                method: "post",
                url: "/web/getSchoolLocation",
                data: payload
            }).then(response => {
                this.school_location = response.data.location
            })
        },
        fetchFormsLocations(payload){
            const groupStore = useCampStore()
            return axios({
                method: "post",
                url: "/forms/getLocations",
                data: payload,
                headers: {'timezone': Intl.DateTimeFormat().resolvedOptions().timeZone}
            }).then(response => {
                this.locations = response.data.locations
                // this.location = response.data.location

                let selectedLocation = response.data.location;

                // Check sessionStorage for preferred location
                // const preferredLocation = localStorage.getItem('preferredLocation');

                const urlParams = new URLSearchParams(window.location.search);
                const preferredLocation = urlParams.get('loc');

                // console.log('preferredLocation', preferredLocation)
                if (preferredLocation == 'AI Online Camp') {
                    const matchingLocation = response.data.locations.find(
                        loc => loc.id === 19
                    );
                    if (matchingLocation) {
                        selectedLocation = matchingLocation;
                    }

                    // Optional: clear the preference after using it
                    // localStorage.removeItem('preferredLocation');
                }

                this.location = selectedLocation;

                groupStore.groups = response.data.groups.groups
                groupStore.groups_count = response.data.groups.count
            })
        }
    }
})
