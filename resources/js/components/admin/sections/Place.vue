<template>
    <draggable :list="components" group="components" @add="onAdd">
        <template v-if="components.length">
            <div class="border mb-2 p-2" v-for="(component, index) in components" :key="Math.random()">
                <div class="font-weight-bold d-flex align-items-center justify-content-between">
                    {{ component.title }}
                    <button type="button" class="btn btn-sm btn-danger" @click="remove(index)">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
                <hr>
                <params v-model="component.params"></params>
            </div>
        </template>
        <div class="small text-secondary" v-else>
            Поместите компонент в эту область
        </div>
    </draggable>
</template>

<script>
import Params from './Params.vue';

export default {
    name: 'layout-item',
    data() {
        return {
            components: []
        }
    },
    components: {
        Params
    },
    props: {
        value: {
            type: Object
        },
        item: {
            required: true,
            type: Object
        }
    },
    methods: {
        remove(index) {
            this.confirm()
                .then(() => {
                    this.$delete(this.components, index);
                });
        },
        onAdd() {
            this.components.forEach(item => item.layout_cell_id = this.item.id)
            this.$emit('input', this.components);
        }
    }
}
</script>

<style lang="css" scoped>
</style>
