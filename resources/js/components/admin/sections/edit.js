import CRUDMixins from '../crud/edit.js';
import Components from './Components.vue';

export default {
    data() {
        return {
            url: '/admin/sections',
        };
    },
    components: {
        Components,
    },
    mixins: [CRUDMixins],
    methods: {
        getFormData() {
            this.form.layout = this.$refs.components.selected;
            this.form.layout_id = this.$refs.components.selected.id;
            return this.form;
        },
    },
};
