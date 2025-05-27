import { defineStore } from 'pinia'
import moment from "moment/moment";

export const useFiltersStore = defineStore({
    id : 'filtersId',

    actions : {
        toJSON(value){
          return JSON.parse(value);
        },
        date_format(value) {
            return moment(value).format('dddd MMM Do, YYYY');
        },
        day_date(value) {
            return moment(value).format('dddd, MMM Do, YYYY');
        },
        format_time_zone(value) {
            let timezone = '';
            let str = value.split('/');
            if(str.length > 1) {
                timezone =  str[1].replace("_", " ");
            } else {
                timezone = str[0].replace("_", " ");
            }
            if(timezone.includes('Los Angeles')) {
                timezone = 'Pacific Time'
            } else if(timezone.includes('New York')) {
                timezone = 'Eastern Time'
            } else if(timezone.includes('Chicago')) {
                timezone = 'Central Time'
            } else if(timezone.includes('Colorado') || timezone.includes('Montana') || timezone.includes('New Mexico') || timezone.includes('Utah') || timezone.includes('Denver')) {
                timezone = 'Mountain Time'
            }
            return timezone;
        },
        time_format(value) {
            return moment(value).format('hh:mm A');
        },
        toDateString(value) {
            return moment(value).toString();
          },

          to_day (value) {
            return  moment(value).format('dddd');
          },

          timeOnly(value){
            let time = new Date(value);
            return time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
          },
        timeFormatIn12Hours(date){
          return moment(date, ["HH.mm"]).format("hh:mm a")
        }
    }
})
