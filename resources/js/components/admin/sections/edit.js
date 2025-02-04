import CRUDMixins from '../crud/edit.js';
import Layout from './Layout.vue';
import Components from './Components.vue';

export default {
    data() {
        return {
            url: '/admin/sections',
        };
    },
    components: {
        Layout,
        Components,
    },
    mixins: [CRUDMixins],
    methods: {
        getFormData() {
            this.form.components = this.$refs.layout.$children.filter(({ name }) => name === 'components')
                .map(({ components }) => components);
            this.form.layout_id = this.$refs.layout.selected.id;
            return this.form;
        },
    },
};
