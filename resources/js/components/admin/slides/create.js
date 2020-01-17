import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/slides'
        }
    },
    mixins: [CRUDMixins],
}
