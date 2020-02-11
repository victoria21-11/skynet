import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/success_stories'
        }
    },
    mixins: [CRUDMixins],
}
