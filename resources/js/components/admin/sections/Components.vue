<template>
    <div class="card mb-3">
        <div class="card-body">
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
                    <div class="components_item" v-for="item in filter()" @click="select(item)">
                        {{ item.title }}
                    </div>
                </div>
                <div class="col-lg-8">
                    <draggable v-model="selected" handle=".components_item">
                        <transition-group>
                            <div class="border mb-3" v-for="(item, index) in selected" :key="item.id + index">
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
                                <div class="p-2">
                                    <div class="d-flex text-uppercase font-weight-bold border-bottom pb-2">
                                        <div class="col-lg-4">
                                            Параметр
                                        </div>
                                        <div class="col-lg-8">
                                            Значение
                                        </div>
                                    </div>
                                    <params v-model="item.params"></params>
                                </div>
                            </div>
                        </transition-group>
                    </draggable>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Params from './Params.vue';
import draggable from 'vuedraggable';

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
    },
    props: {
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
        }
    }
}
</script>

<style lang="css" scoped>
</style>
