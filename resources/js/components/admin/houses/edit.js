import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/houses'
        }
    },
    mixins: [CRUDMixins],
    methods: {
        getFormData() {
            this.form.street_id = this.form.street.id;
            return this.form;
        }
    }
}
