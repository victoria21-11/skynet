import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/global_settings'
        }
    },
    mixins: [CRUDMixins],
}
