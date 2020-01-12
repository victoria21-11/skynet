export default {
    data() {
        return {
            form: {},
            url: '/admin/tariffs'
        }
    },
    methods: {
        store() {
            axios.post(this.url)
                .then(response => {

                })
        }
    }
}
