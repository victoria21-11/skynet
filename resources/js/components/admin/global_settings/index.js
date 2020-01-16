import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/global_settings'
        }
    },
    mixins: [CRUDMixins],
}
