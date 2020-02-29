<template>
    <input type="text" class="form-control" v-model="localValue" @change="updateValue" v-else>
</template>

<script>
export default {
    data() {
        return {
            localValue: this.getValue()
        }
    },
    props: {
        param: {
            required: true,
            type: Object
        },
        value: {
            type: String
        }
    },
    methods: {
        getValue(local = false) {
            const value = local ? this.localValue : this.param.value;
            return value ? value : this.param.default_value;
        },
        updateValue() {
            this.$emit('input', this.getValue(true));
        }
    }
}
</script>

<style lang="css" scoped>
</style>
