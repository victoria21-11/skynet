<template>
    <div class="">
        <div v-for="row in markup">
            <row :row="row"></row>
        </div>
    </div>
</template>

<script>
import Row from './Row.vue';

export default {
    props: {
        markup: {
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
