import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/orders'
        }
    },
    mixins: [CRUDMixins],
}
