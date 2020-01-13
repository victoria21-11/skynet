export default {
    data() {
        return {
            form: {},
            url: '/admin/tariff_groups'
        }
    },
    methods: {
        store() {
            axios.post(this.url, this.form)
                .then(response => {
                    window.location.replace(this.url);
                })
        }
    }
}
