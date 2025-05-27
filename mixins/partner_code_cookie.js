export default {
    computed : {
        partner_code() {
            let key = 'partner_code';
            let a = 0;
            try {
                a = document.cookie.split('; ').find(row => row.startsWith(key)).split('=')[1];
            } catch (e) {
                a = 0;
            }
            console.log(a);
            return a;
        },
    },
}
