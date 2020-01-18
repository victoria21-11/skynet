<template>
    <div class="px-4 py-2 my-2">
        <div class="d-flex align-items-center justify-content-between" @click="toggleChildren">
            <div class="">
                {{ data.section.title }}
            </div>
            <div v-if="localData.children_trees && localData.children_trees.length" class="">
                {{ showChildren }}
                <i class="fas fa-minus"></i>
                <i class="fas fa-plus"></i>
            </div>
        </div>

        <draggable v-model="localData.children_trees" @end="onEnd">
            <transition-group>
                <div v-if="showChildren" v-for="item in localData.children_trees" :key="item.id">
                    <tree :key="item.id" :data="item"></tree>
                </div>
            </transition-group>
        </draggable>
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
    },
    methods: {
        toggleChildren() {
            this.showChildren = !this.showChildren;
        },
        onEnd($event) {
            const order = this.localData.children_trees
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
