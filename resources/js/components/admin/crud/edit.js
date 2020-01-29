export default {
    data() {
        return {
            form: this.data,
            url: '/',
            errors: {}
        }
    },
    props: {
        data: {
            type: Object,
            required: true,
        }
    },
    methods: {
        update() {
            this.errors = {};
            axios.put(this.url + '/' + this.data.id, this.form)
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
