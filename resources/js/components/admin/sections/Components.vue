<template>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center mb-3">
                <div class="col-lg-4">
                    <input type="text" class="form-control" v-model="search">
                </div>
                <div class="col-lg-8">
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
                    <div v-for="(item, index) in selected" :key="item.id">
                        <div class="components_item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    {{ item.title }}
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-sm btn-danger" @click="remove(index)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Параметр</th>
                                        <th>Значение</th>
                                    </tr>
                                </thead>
                                <params v-model="item.params"></params>
                            </table>
                        </div>
                    </div>
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
            selected: this.used
        }
    },
    components: {
        Params
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
