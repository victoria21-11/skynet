export default {
    data() {
        return {
            form: this.data,
            url: '/'
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
            axios.put(this.url + '/' + this.data.id, this.form)
                .then(response => {
                    window.location.replace(this.url);
                })
                .catch(error => {
                    new Noty({
                        type: 'error',
                        text: error.response.data.message,
                    }).show();
                });
        }
    }
}
