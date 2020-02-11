import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/success_stories'
        }
    },
    mixins: [CRUDMixins],
}
