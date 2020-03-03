<template>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div>
                        <input type="text" class="form-control" v-model="search">
                    </div>
                    <draggable :list="localComponents" :group="{ name: 'components', pull: 'clone', put: false }">
                        <div class="components_item" v-for="item in filter()" :key="item.id">
                            {{ item.title }}
                        </div>
                    </draggable>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <label>Выберите шаблон</label>
                        <select class="form-control" v-model="selected" @change="onSelect">
                            <option v-for="layout in layouts" :value="layout">
                                {{ layout.title }}
                            </option>
                        </select>
                    </div>
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Params from './Params.vue';

export default {
    data() {
        return {
            localComponents: this.components,
            search: '',
            selected: this.selectedLayout,
            nodes: []
        }
    },
    components: {
        Params,
    },
    props: {
        layouts: {
            required: true,
            type: Array,
            default: () => {
                return [];
            }
        },
        selectedLayout: {
            type: Object,
            default: () => {
                return {};
            }
        },
        components: {
            required: true,
            type: Array,
            default: () => {
                return [];
            }
        },
    },
    mounted() {
        this.toggleLayots();
        this.setComponents();
    },
    methods: {
        filter() {
            if(this.search.length) {
                return this.localComponents.filter(({title}) => title.includes(this.search));
            }
            return this.localComponents;
        },
        toggleLayots() {
            this.nodes = Array.from(document.getElementsByClassName('layouts'));
            this.nodes.forEach(({classList}) => classList.add('d-none'));
            this.onSelect();
        },
        onSelect() {
            this.nodes.filter(({dataset}) => dataset.id == this.selectedLayout.id)
                .forEach(({classList}) => classList.remove('d-none'));
        },
        setComponents() {
            if(this.selectedLayout.components) {
                this.$children.filter(({ name }) => name === 'components')
                    .forEach((item, index) => item.setComponents(this.selectedLayout.components[index]));
            }
        }
    },
}
</script>

<style lang="css" scoped>
</style>
