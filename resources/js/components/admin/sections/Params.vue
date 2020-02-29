<template>
    <tbody>
        <tr v-for="item in params">
            <th>{{ item.title }}</th>
            <th>
                <template v-if="item.multiple">
                    <multiple-param v-model="item.value"></multiple-param>
                </template>
                <template v-else>
                    <single-param v-model="item.value" :param="item"></single-param>
                </template>
            </th>
        </tr>
    </tbody>
</template>

<script>
import MultipleParam from './MultipleParam.vue';
import SingleParam from './SingleParam.vue';
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
        MultipleParam,
        SingleParam
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
