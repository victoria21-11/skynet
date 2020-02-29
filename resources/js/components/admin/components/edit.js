import CRUDMixins from '../crud/edit.js';
import Params from './Params.vue';

export default {
    data() {
        return {
            url: '/admin/components'
        }
    },
    components: {
        Params
    },
    methods: {
        getFormData() {
            this.form.params = this.$refs.params.params;
            return this.form;
        }
    },
    mixins: [CRUDMixins],
}
