import { defineStore } from 'pinia'

export const useStudentsStore = defineStore({
    id : 'studentsStoreId',
    state : () => ({
        student : {
            id : '',
            full_name : '',
            age : '',
            email : ''
        },
        students : [],
        students_count : 0,
        existingStudent:false,
        addStudent:false,
        parent : {
            id : '',
            full_name : '',
            age : '',
            email : '',
            stripe_id: '',
        }
    }),

    actions : {
        getExistingStudents(payload){
            axios({
                method: "post",
                url: "/forms/getExistingStudents",
                data: payload
            }).then(response => {
                this.students = response.data.students;
                this.parent = response.data.parent;
                this.addStudent = (response.data.parent!==null)?false:true;
                this.existingStudent = (response.data.parent!==null)?false:true;
                this.students_count = response.data.students_count;

            }).catch(error => {
            })
        },
        getExistingStudentsNew(payload){
            return new Promise((resolve, reject) =>{
                axios({
                    method: "post",
                    url: "/forms/getExistingStudents",
                    data: payload
                }).then(response => {
                    resolve(response)
                }).catch(error => {
                    console.log(error);
                    reject(error)
                })
            })
        },
        resetParent(){
            console.log('12121');
            this.parent = { id : '',
                full_name : '',
                age : '',
                email : ''
            }
        },
    }
})
