<template>
    <div :class="row.item">
        <div class="p-2" :class="item.item" v-for="(item, index) in row.items">
            <div class="border p-4">
                <Place v-model="item.components" :item="item" />
            </div>
        </div>
    </div>
</template>

<script>
import Place from './Place.vue';

export default {
    name: 'layout-item',
    data() {
        return {
            components: []
        }
    },
    components: {
        Place
    },
    props: {
        row: {
            required: true,
            type: Object
        },
    },
}
</script>

<style lang="css" scoped>
</style>
