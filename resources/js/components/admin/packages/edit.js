import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/packages'
        }
    },
    mixins: [CRUDMixins],
}
