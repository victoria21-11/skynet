import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/global_settings'
        }
    },
    mixins: [CRUDMixins],
}
