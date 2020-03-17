import CRUDMixins from '../crud/index.js';

export default {
    data() {
        return {
            url: '/admin/tariffs',
        };
    },
    mixins: [CRUDMixins],
    methods: {
        sync() {
            axios.get(`${this.url}/sync`);
        },
    },
};
