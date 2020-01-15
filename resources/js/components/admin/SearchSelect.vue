<template>
    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" v-model="query" @input="search" @click="toggleOptions">
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
            selected: null
        }
    },
    props: {
        value: {
            type: [String, Number],
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
        }
    },
    components: {
        vueDropzone: vue2Dropzone
    },
    mounted() {

    },
    methods: {
        search() {
            let params = {};
            params[this.columnName] = this.query;
            axios.get(this.url, {
                params: params
            })
                .then(response => {
                    this.options = response.data.paginatedData.data
                    this.showOptions = true;
                });
        },
        select(item) {
            this.selected = item;
            this.query = item[this.columnName];
            this.$emit('input', item.id);
            this.showOptions = false;
        },
        toggleOptions() {
            this.showOptions = !this.showOptions;
        }
    }
}
</script>

<style lang="css" scoped>
</style>
