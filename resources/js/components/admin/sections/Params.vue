<template>
    <div class="">
        <div class="form-group mb-2" v-for="item in params">
            <label for="">{{ item.title }}</label>
            <template v-if="item.multiple">
                <multiple-param v-model="item.value"></multiple-param>
            </template>
            <template v-else>
                <single-param v-model="item.value" :param="item"></single-param>
            </template>
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
}
</script>

<style lang="css" scoped>
</style>
