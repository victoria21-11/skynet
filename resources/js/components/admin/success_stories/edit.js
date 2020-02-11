import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/success_stories'
        }
    },
    mixins: [CRUDMixins],
}
