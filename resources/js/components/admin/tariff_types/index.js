export default {
    data() {
        return {
            paginatedData: {},
            filters: {},
            url: '/admin/tariff_types'
        }
    },
    props: {

    },
    mounted() {
        this.getData();
    },
    methods: {
        getData(page = 1) {
            axios.get(window.location.href, {
                params: Object.assign(this.filters, {
                    page: page
                })
            })
                .then(response => {
                    this.paginatedData = response.data.paginatedData;
                    this.filters = Object.assign(this.filters, response.data.filters);
                    window.history.pushState('', '', this.url + '?' + response.data.request);
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
