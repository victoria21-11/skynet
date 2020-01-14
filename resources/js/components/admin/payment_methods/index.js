import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/payment_methods'
        }
    },
    mixins: [CRUDMixins],
}
