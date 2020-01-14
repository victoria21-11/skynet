import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/payment_methods'
        }
    },
    mixins: [CRUDMixins],
}
