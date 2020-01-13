import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/antivirus_types'
        }
    },
    mixins: [CRUDMixins],
}
