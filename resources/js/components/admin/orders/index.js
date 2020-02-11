import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/orders'
        }
    },
    mixins: [CRUDMixins],
}
