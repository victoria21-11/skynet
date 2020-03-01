import CRUDMixins from '../crud/edit.js';
import Components from './Components.vue';

export default {
    data() {
        return {
            url: '/admin/sections'
        }
    },
    components: {
        Components
    },
    mixins: [CRUDMixins],
    methods: {
        getFormData() {
            this.form.components = this.$refs.components.layouts[0];
            return this.form;
        }
    }
}
