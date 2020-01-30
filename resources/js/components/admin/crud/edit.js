export default {
    data() {
        return {
            form: this.data,
            url: '/',
            modifiedURL: null,
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
            if(!this.modifiedURL) {
                this.modifiedURL = this.url + '/' + this.data.id;
            }
            axios.put(this.modifiedURL, this.form)
                .then(response => {
                    this.onSuccess();
                })
                .catch(error => {
                    this.onError();
                });
        },
        onSuccess() {
            window.location.replace(this.url);
        },
        onError() {
            this.errors = error.response.data.errors
            new Noty({
                type: 'error',
                text: error.response.data.message,
            }).show();
        }
    }
}
