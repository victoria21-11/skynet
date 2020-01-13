import CRUDMixins from '../crud/edit.js';

export default {
    data() {
        return {
            url: '/admin/tariff_groups'
        }
    },
    mixins: [CRUDMixins],
}
