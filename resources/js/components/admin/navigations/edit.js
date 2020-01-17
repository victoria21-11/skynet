import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/navigations'
        }
    },
    mixins: [CRUDMixins],
}
