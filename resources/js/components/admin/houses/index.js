import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/houses'
        }
    },
    mixins: [CRUDMixins],
    methods: {
        getFormData(page) {
            if(this.filters.street) {
                this.filters.street_id = this.filters.street.id;
            }
            return {
                params: Object.assign(this.filters, {
                    page: page,
                    sort_column: this.sortColumn,
                    sort_direction: this.sortDirection,
                })
            }
        },
    }
}
