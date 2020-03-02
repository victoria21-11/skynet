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
                        <select class="form-control" v-model="selected">
                            <option v-for="layout in layouts" :value="layout">
                                {{ layout.title }}
                            </option>
                        </select>
                    </div>
                    <template v-if="selected">
                        <h2>{{ selected.title }}</h2>
                        <Markup ref="layout" :markup="selected.markup" />
                        <hr>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Params from './Params.vue';
import draggable from 'vuedraggable';
import Markup from './Markup.vue';

export default {
    data() {
        return {
            localComponents: this.components,
            search: '',
            selected: this.selectedLayout
        }
    },
    components: {
        Params,
        draggable,
        Markup
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
    methods: {
        filter() {
            if(this.search.length) {
                return this.localComponents.filter(({title}) => title.includes(this.search));
            }
            return this.localComponents;
        },
    },
}
</script>

<style lang="css" scoped>
</style>
