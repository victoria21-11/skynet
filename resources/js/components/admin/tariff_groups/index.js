import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/tariff_groups'
        }
    },
    mixins: [CRUDMixins],
}
