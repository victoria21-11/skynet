import CRUDMixins from '../crud/create.js';
import Components from './Components.vue';

export default {
    data() {
        return {
            url: '/admin/sections',
        }
    },
    components: {
        Components
    },
    mixins: [CRUDMixins],
    methods: {
        getFormData() {
            this.form.components = this.$refs.components.selected;
            return this.form;
        }
    }
}
