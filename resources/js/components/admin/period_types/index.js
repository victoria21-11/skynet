import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/period_types'
        }
    },
    mixins: [CRUDMixins],
}
