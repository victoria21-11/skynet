import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/social_networks'
        }
    },
    mixins: [CRUDMixins],
}
