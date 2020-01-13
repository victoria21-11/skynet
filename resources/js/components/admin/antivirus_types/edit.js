import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/antivirus_types'
        }
    },
    mixins: [CRUDMixins],
}
