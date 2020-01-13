export default {
    data() {
        return {
            paginatedData: {},
            filters: {},
            url: '/admin/tariff_groups'
        }
    },
    props: {

    },
    mounted() {
        this.getData();
    },
    methods: {
        getData(page = 1) {
            axios.get(this.url, {
                params: Object.assign(this.filters, {
                    page: page
                })
            })
                .then(response => {
                    this.paginatedData = response.data.paginatedData
                })
        },
        clearFilters() {
            this.filters = {};
            this.getData();
        },
        remove(id) {
            axios.delete(this.url + '/' + id)
                .then(response => {
                    this.getData();
                })
        }
    }
}
