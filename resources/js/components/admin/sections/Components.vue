<template>
    <div class="card mb-3">
        <div class="card-body">
            <!-- <draggable :list="localComponents" :group="{ name: 'components', pull: 'clone', put: false }">
                <div class="p-4" v-for="(item, index) in localComponents" :key="item.id">
                    {{ item.title }}
                </div>
            </draggable>
            <Layout ref="layout" :layouts="layouts" /> -->
            <div class="row align-items-center mb-3">
                <div class="col-lg-4">
                    <input type="text" class="form-control" v-model="search">
                </div>
                <div class="col-lg-8 text-uppercase font-weight-bold">
                    Выбранные компоненты
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <draggable :list="localComponents" :group="{ name: 'components', pull: 'clone', put: false }">
                        <div class="components_item" v-for="item in filter()" :key="item.id">
                            {{ item.title }}
                        </div>
                    </draggable>
                </div>
                <div class="col-lg-8">
                    <Layout ref="layout" :layouts="layouts" />
                    <!-- <draggable v-model="selected" handle=".components_item">
                        <transition-group>
                            <div class="border mb-3" v-for="(item, index) in selected" :key="item.id + Math.random()">
                                <div class="components_item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="text-primary font-weight-bold">
                                            {{ item.title }}
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn btn-sm btn-danger" @click="remove(index)">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <params v-model="item.params"></params>
                                </div>
                            </div>
                        </transition-group>
                    </draggable> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Params from './Params.vue';
import draggable from 'vuedraggable';
import Layout from './Layout.vue';

export default {
    data() {
        return {
            localComponents: this.components,
            search: '',
            selected: this.used,
        }
    },
    components: {
        Params,
        draggable,
        Layout
    },
    props: {
        layouts: {
            required: true,
            type: Array,
            default: () => {
                return [];
            }
        },
        components: {
            required: true,
            type: Array,
            default: () => {
                return [];
            }
        },
        used: {
            required: false,
            type: Array,
            default: () => {
                return [];
            }
        }
    },
    methods: {
        filter() {
            if(this.search.length) {
                return this.localComponents.filter(({title}) => title.includes(this.search));
            }
            return this.localComponents;
        },
        select(item) {
            this.selected.push(item);
        },
        remove(index) {
            this.confirm()
                .then(() => {
                    this.$delete(this.selected, index);
                });
        },
    },
}
</script>

<style lang="css" scoped>
</style>
