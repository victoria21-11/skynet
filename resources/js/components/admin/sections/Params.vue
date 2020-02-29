<template>
    <tbody>
        <tr v-for="item in params">
            <th>{{ item.title }}</th>
            <th>
                <template v-if="item.multiple">
                    <multiple-param v-model="item.value"></multiple-param>
                </template>
                <input type="text" class="form-control" v-model="item.value" v-else>
            </th>
        </tr>
    </tbody>
</template>

<script>
import MultipleParam from './MultipleParam.vue';
export default {
    data() {
        return {
            params: this.value
        }
    },
    props: {
        value: {
            type: Array,
            default: () => {
                return [];
            }
        },
    },
    components: {
        MultipleParam
    },
    watch: {
        items: {
            handler() {
                this.$emit('input', this.params);
            },
            deep: true
        },
    },
}
</script>

<style lang="css" scoped>
</style>
