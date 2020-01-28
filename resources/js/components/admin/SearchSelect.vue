<template>
    <div>
        <div v-if="tags">
            <span class="badge badge-primary m-1" v-for="(item, index) in selected">
                {{ item.title }}
                <span class="tag_close" @click="removeItem(index)">&#x2715;</span>
            </span>
        </div>
        <div class="form-control" contenteditable v-model="query" @input="search" @click="toggleOptions"></div>
        <div class="search-select_container">
            <div class="search-select_options border rounded" v-if="showOptions">
                <div class="search-select_item p-3" :class="{ active: item == selected }" @click="select(item)" v-for="item, key in options">
                    {{ item[columnName] }}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import vue2Dropzone from 'vue2-dropzone';

export default {
    data() {
        return {
            query: null,
            options: [],
            showOptions: false,
            selected: this.value
        }
    },
    props: {
        value: {
            default: () => {
                return '';
            }
        },
        url: {
            required: true,
            type: String,
            default: '',
        },
        columnName: {
            type: String,
            default: 'title',
        },
        tags: {
            type: [Boolean, Number],
            default: false,
        }
    },
    components: {
        vueDropzone: vue2Dropzone
    },
    methods: {
        search() {
            let params = {};
            params[this.columnName] = this.query;
            axios.get(this.url, {
                params: params
            })
                .then(response => {
                    this.options = response.data;
                    this.showOptions = true;
                });
        },
        select(item) {
            const exists = this.selected.find(({id}) => id == item.id);
            if(exists) {
                return;
            }
            this.selected.push(item);
            this.query = item[this.columnName];
            this.$emit('input', this.selected);
            this.showOptions = false;
        },
        toggleOptions() {
            this.showOptions = !this.showOptions;
        },
        removeItem(index) {
            this.$delete(this.selected, index);
        }
    }
}
</script>

<style lang="css" scoped>
</style>
