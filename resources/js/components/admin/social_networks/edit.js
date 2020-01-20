import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/social_networks'
        }
    },
    mixins: [CRUDMixins],
}
