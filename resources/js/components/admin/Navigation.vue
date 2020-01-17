<template>
    <div class="">
        <div class="card mb-3">
            <div class="card-header">
                {{ data[0].parent.title }}
            </div>
            <div class="card-body">
                <draggable v-model="localData" @end="onEnd">
                    <transition-group>
                        <div class="d-flex justify-content-between py-1 border-bottom" v-for="item in localData" :key="item.id">
                            <div>{{ item.child.title }}</div>
                            <div>
                                <button class="btn btn-primary mx-1">
                                    <i class="fas fa-pen-square"></i>
                                </button>
                            </div>
                        </div>
                    </transition-group>
                </draggable>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';

export default {
    components: {
        draggable,
    },
    data() {
        return {
            localData: this.data,
        }
    },
    props: {
        data: {
            required: true,
            type: Array,
            default: () => {
                return []
            }
        }
    },
    methods: {
        onEnd($event) {
            const order = this.localData
                .map(({id}, index) => {
                    return {
                        id,
                        order: index + 1
                    }
                });
            axios.put('/admin/navigations/order', {
                order
            })
                .then(response => {

                });
        }
    }
}
</script>

<style lang="css" scoped>
</style>
