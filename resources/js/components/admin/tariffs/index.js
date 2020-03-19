import CRUDMixins from '../crud/index.js';
import Sync from './Sync.vue';

export default {
    data() {
        return {
            url: '/admin/tariffs',
            showSync: false,
        };
    },
    components: { Sync },
    mixins: [CRUDMixins],
    methods: {
        sync() {
            if (this.showSync) {
                return;
            }
            this.showSync = true;
            this.$refs.sync.getData();
        },
    },
};
