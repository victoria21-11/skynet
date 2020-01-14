import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/period_types'
        }
    },
    mixins: [CRUDMixins],
}
