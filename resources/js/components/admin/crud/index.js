export default {
    data() {
        return {
            paginatedData: {},
            filters: {},
            url: '/',
            sortDirection: 'desc',
            sortColumn: 'id',
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
                    page: page,
                    sort_column: this.sortColumn,
                    sort_direction: this.sortDirection,
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
            window.history.pushState('', '', this.url);
            this.getData();
        },
        remove(id) {
            axios.delete(this.url + '/' + id)
                .then(response => {
                    this.getData();
                })
        },
        toggleSortDirection() {
            if(this.sortDirection == 'desc') {
                return 'asc';
            }
            return 'desc';
        },
        sort($event, columnName) {
            this.sortColumn = columnName;
            document.querySelectorAll('th.sort')
                .forEach(({classList}) => classList.remove('asc', 'desc'));
            $event.target.classList.remove(this.sortDirection)
            this.sortDirection = this.toggleSortDirection();
            $event.target.classList.add(this.sortDirection);
            this.getData();
        }
    }
}
