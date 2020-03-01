<template>
    <div class="">
        <div v-for="layout in layouts" :key="layout.id">
            <template v-for="(row, index) in layout.markup">
                <row :row="row"></row>
            </template>
        </div>
    </div>
</template>

<script>
import Row from './Row.vue';

export default {
    props: {
        layouts: {
            required: true,
            type: Array,
            default: () => {
                return [];
            }
        },
    },
    components: {
        Row
    },
    methods: {

    }
}
</script>

<style lang="css" scoped>
</style>
