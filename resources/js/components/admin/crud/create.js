export default {
    data() {
        return {
            form: {},
            url: '/',
            errors: {}
        }
    },
    methods: {
        store() {
            this.errors = {};
            axios.post(this.url, this.form)
                .then(response => {
                    window.location.replace(this.url);
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                    new Noty({
                        type: 'error',
                        text: error.response.data.message,
                    }).show();
                });
        }
    }
}
