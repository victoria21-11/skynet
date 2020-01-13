import CRUDMixins from '../crud/create.js';

export default {
    data() {
        return {
            url: '/admin/tariff_groups'
        }
    },
    mixins: [CRUDMixins],
}
