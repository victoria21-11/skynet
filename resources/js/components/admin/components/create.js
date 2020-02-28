import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/components'
        }
    },
    mixins: [CRUDMixins],
}
