import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/houses'
        }
    },
    mixins: [CRUDMixins],
}
