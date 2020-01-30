import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/profile',
            modifiedURL: '/admin/profile',
        }
    },
    mixins: [CRUDMixins],
    methods: {
        onSuccess() {
            new Noty({
                type: 'success',
                text: 'Данные сохранены!',
            }).show();
        },
        updatePassword() {
            this.errors = {};
            axios.put('/admin/password/reset', this.form)
                .then(response => {
                    this.form.old_password = null;
                    this.form.password = null;
                    this.form.password_confirmation = null;
                    this.onSuccess();
                })
                .catch(error => {
                    this.onError();
                });
        }
    }
}
