import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/questions'
        }
    },
    mixins: [CRUDMixins],
}
