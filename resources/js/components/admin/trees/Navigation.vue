<template>
    <div class="card mb-3">
        <div class="card-header">
            {{ data.section.title }}
        </div>
        <div class="card-body">
            <draggable v-model="localData.all_children_trees" @end="onEnd">
                <transition-group>
                    <template v-for="item in localData.all_children_trees">
                        <tree :key="item.id" :data="item"></tree>
                    </template>
                </transition-group>
            </draggable>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';
import Tree from './Tree.vue';

export default {
    components: {
        draggable,
        Tree
    },
    data() {
        return {
            localData: this.data,
            showChildren: false
        }
    },
    props: {
        data: {
            required: true,
            type: Object,
            default: () => {
                return {}
            }
        },
        border: {
            type: Boolean,
            default: true
        }
    },
    methods: {
        toggleChildren() {
            this.showChildren = !this.showChildren;
        },
        onEnd($event) {
            const order = this.localData.all_children_trees
                .map(({id}, index) => {
                    return {
                        id,
                        order: index + 1
                    }
                });
            axios.put('/admin/trees/order', {
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
