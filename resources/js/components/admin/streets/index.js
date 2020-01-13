import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/streets'
        }
    },
    mixins: [CRUDMixins],
}
