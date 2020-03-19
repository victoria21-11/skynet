<template>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="+7 (812)" v-model="localValue" @input="onInput">
    </div>
</template>

<script>
import VMasker from 'vanilla-masker';
export default {
    data() {
        return {
            localValue: null
        }
    },
    value: {
        type: Object,
        default: null
    },
    methods: {
        onInput($event) {
            let result = this.localValue;
            var selectionStart = $event.target.selectionStart;
            var oldLength = result.length;
            result = result.replace('+7', '');
            result = VMasker.toPattern(result, { pattern: '99999999999' });
            if(result.length == 10) {
                this.onChange(result);
                let firstChar = result.charAt(0);
                if(firstChar == 8 || firstChar == 7) {
                    result = result.slice(1);
                }
            }
            result = VMasker.toPattern(result, { pattern: '(999) 999-9999' });
            result = `+7 ${result}`;
            this.localValue = result;
            selectionStart += (result.length - oldLength) + 1;
            this.$nextTick(() => {
                $event.target.selectionEnd = selectionStart;
            });
            result = VMasker.toPattern( result, { pattern: '99999999999' });
        },
        onChange(result) {
            this.$emit('input', result);
            this.$emit('change');
        }
    }
}
</script>

<style lang="css" scoped>
</style>
