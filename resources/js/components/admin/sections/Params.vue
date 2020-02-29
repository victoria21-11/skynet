<template>
    <div class="pt-2">
        <div class="d-flex mb-2" v-for="item in params">
            <div class="col-lg-4">
                {{ item.title }}
            </div>
            <div class="col-lg-8">
                <template v-if="item.multiple">
                    <multiple-param v-model="item.value"></multiple-param>
                </template>
                <template v-else>
                    <single-param v-model="item.value" :param="item"></single-param>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import MultipleParam from './MultipleParam.vue';
import SingleParam from './SingleParam.vue';
export default {
    data() {
        return {
            params: this.value,
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
