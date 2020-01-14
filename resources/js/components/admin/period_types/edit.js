import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/period_types'
        }
    },
    mixins: [CRUDMixins],
}
