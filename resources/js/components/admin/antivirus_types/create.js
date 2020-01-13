import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/antivirus_types'
        }
    },
    mixins: [CRUDMixins],
}
