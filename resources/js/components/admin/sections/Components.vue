<template>
    <draggable class="border p-4 h-100" :list="components" group="components" @add="onAdd">
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
        <div class="" v-else>
            Поместите компонент в эту область
        </div>
    </draggable>
</template>

<script>
import Params from './Params.vue';

export default {
    name: 'components',
    data() {
        return {
            components: [],
            name: 'components'
        }
    },
    components: {
        Params
    },
    methods: {
        remove(index) {
            this.confirm()
                .then(() => {
                    this.$delete(this.components, index);
                });
        },
        onAdd() {
            // this.$emit('input', this.components);
        },
        setComponents(data) {
            if(Array.isArray(data)) {
                this.components = data;
            }
        }
    }
}
</script>

<style lang="css" scoped>
</style>
