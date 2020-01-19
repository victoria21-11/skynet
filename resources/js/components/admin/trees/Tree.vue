<template>
    <div v-if="!deleted" class="px-4 py-2 my-2">
        <div class="d-flex align-items-center justify-content-between tree" @click="toggleChildren">
            <div>
                {{ data.section.title }}
            </div>
            <div class="d-flex align-items-center flex-nowrap">
                <div class="d-flex align-items-center flex-nowrap">
                    <a role="button" class="btn btn-sm btn-outline-dark mx-1" :href="'/admin/sections/' + data.section_id + '/edit'" target="_blank"><i class="fas fa-pen-square"></i></a>
                    <button v-if="localData.children_trees && localData.children_trees.length" @click.stop="toggleAdd" type="button" class="btn btn-sm btn-outline-dark mx-1">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button @click.stop="remove" type="button" class="btn btn-sm btn-outline-dark mx-1">
                        <i class="far fa-trash-alt"></i>
                    </button>
                    <div class="custom-control custom-checkbox mx-1">
                        <input type="checkbox" class="custom-control-input" :id="'published_' + data.id" @change="updateSection" v-model="localData.section.published">
                        <label class="custom-control-label" :for="'published_' + data.id"></label>
                    </div>
                </div>
                <div class="px-2" v-if="localData.children_trees && localData.children_trees.length">
                    <div v-if="showChildren">
                        -
                    </div>
                    <div v-else>
                        +
                    </div>
                </div>
            </div>
        </div>

        <draggable v-model="localData.children_trees" @end="onEnd">
            <transition-group>
                <div v-if="showChildren" v-for="item in localData.children_trees" :key="item.url">
                    <tree :data="item"></tree>
                </div>
                <div v-if="added" key="new" class="px-4 py-2 my-2 d-flex align-items-center justify-content-between">
                    <select class="form-control form-control-sm" v-model="newTree.section">
                        <option value=""></option>
                        <option v-for="item in sections" :value="item">
                            {{ item.title }}
                        </option>
                    </select>
                    <div class="">
                        <button @click="save" type="button" class="btn btn-sm btn-outline-dark">
                            Сохранить
                        </button>
                    </div>
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
            showChildren: false,
            added: false,
            newTree: {
                section: null
            },
            sections: [],
            deleted: false
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
            axios.put('/admin/trees/order', {
                order
            })
                .then(response => {

                });
        },
        toggleAdd() {
            if(this.added) {
                this.added = false;
                this.newTree = {
                    section: null
                }
                return;
            }
            this.add();
        },
        add() {
            if(this.added) {
                return;
            }
            this.added = true;
            axios.get('/admin/trees/sections')
                .then(response => {
                    this.sections = response.data.sections;
                });
        },
        save() {
            this.newTree.tree_id = this.localData.id;
            this.newTree.section_id = this.newTree.section.id;
            this.newTree.url = this.localData.url + '/' + this.newTree.section.url;
            axios.post('/admin/trees', this.newTree)
                .then(response => {
                    this.localData.children_trees.push(response.data.tree);
                    this.added = false;
                    this.newTree = {
                        section: null
                    }
                })
                .catch(error => {
                    new Noty({
                        type: 'error',
                        text: error.response.data.message,
                    }).show();
                });
        },
        updateSection() {
            axios.put('/admin/sections/' + this.localData.section.id, this.localData.section)
                .then(response => {
                    new Noty({
                        type: 'success',
                        text: 'Данные сохранены!',
                    }).show();
                })
                .catch(error => {
                    new Noty({
                        type: 'error',
                        text: error.response.data.message,
                    }).show();
                });
        },
        remove() {
            this.confirm()
                .then(response => {
                    axios.delete('/admin/trees/' + this.localData.id)
                        .then(response => {
                            this.deleted = true;
                        })
                });
        },
    }
}
</script>

<style lang="css" scoped>
</style>
