<template>
    <div class="">
        <div class="d-flex align-items-center no-gutters mb-2" v-for="(item, index) in items">
            <div class="col pr-1">
                <input type="text" class="form-control" v-model="item.value" @change="updateValue">
            </div>
            <div class="col-auto pl-1">
                <button type="button" class="btn btn-sm btn-primary" v-if="items.length == 1 || ++index == items.length" @click="add">
                    <div class="">
                        <i class="fas fa-plus"></i>
                    </div>
                </button>
                <button type="button" class="btn btn-sm btn-danger" v-else @click="remove(index)">
                    <div class="">
                        <i class="far fa-trash-alt"></i>
                    </div>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: this.prepareItems()
        }
    },
    props: {
        value: {
            default: () => {
                return [null];
            }
        }
    },
    methods: {
        add() {
            this.items.push({});
        },
        remove(index) {
            this.$delete(this.items, index);
            this.updateValue();
        },
        getValue() {
            return this.items.map(({value}) => value);
        },
        updateValue() {
            this.$emit('input', this.getValue());
        },
        prepareItems() {
            return this.value.map(item => {
                return {
                    value: item
                }
            });
        }
    }
}
</script>

<style lang="css" scoped>
</style>
