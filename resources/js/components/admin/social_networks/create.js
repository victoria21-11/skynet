import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/social_networks'
        }
    },
    mixins: [CRUDMixins],
}
