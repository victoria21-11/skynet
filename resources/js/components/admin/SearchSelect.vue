<template>
    <div>
        <div v-if="tags">
            <span class="badge badge-primary m-1" v-for="(item, index) in selected">
                {{ item[columnName] }}
                <span class="tag_close" @click="removeItem(index)">&#x2715;</span>
            </span>
        </div>
        <input class="form-control" v-model="query" @input="search" @click="toggleOptions">
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
            type: [Array, Object],
            default: () => {
                return []
            },
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
    mounted() {
        if(_.isObject(this.selected)) {
            this.query = this.selected[this.columnName];
        }
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
            if(_.isObject(this.selected)) {
                this.selected = item;
            }

            if(_.isArray(this.selected)) {
                const exists = this.selected.find(({id}) => id == item.id);
                if(exists) {
                    return;
                }
                this.selected.push(item);
            }

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
