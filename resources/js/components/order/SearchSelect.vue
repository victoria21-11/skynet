<template>
    <div class="form-group">
        <input type="text"
            class="form-control"
            :placeholder="placeholder"
            :readonly="readonly"
            v-model="localValue"
            @keyup.down="keyDown"
            @keyup.up="keyUp"
            @blur="onBlur"
            @input="search">
        <div class="" v-show="showOptions">
            <div class=""
                :class="{ 'text-primary': currentIndex == index }"
                v-for="(option, index) in options"
                @click="select(option, false)">
                {{ option.title }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            localValue: this.value,
            options: [],
            loading: false,
            showOptions: false,
            currentIndex: null
        }
    },
    props: {
        placeholder: {
            type: String,
            default: ''
        },
        value: {
            type: Object,
            default: null
        },
        url: {
            required: true,
            type: String,
            default: ''
        },
        readonly: {
            type: Boolean,
            default: false
        },
    },
    methods: {
        search() {
            if(this.loading) {
                return;
            }
            this.$emit('input', null);
            this.onClear();
            this.loading = true;
            axios.get(this.url, {
                params: {
                    title: this.localValue
                }
            })
                .then(response => {
                    this.options = response.data
                    this.showOptions = true;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        select(option, showOptions = true) {
            this.localValue = option.title;
            this.$emit('input', option);
            this.showOptions = showOptions;
        },
        keyDown() {
            let min = 0;
            let max = this.options.length - 1;
            if(this.currentIndex >= max || _.isNull(this.currentIndex)) {
                this.currentIndex = min;
            } else {
                this.currentIndex++;
            }
            this.select(this.options[this.currentIndex]);
        },
        keyUp() {
            let min = 0;
            let max = this.options.length - 1;
            if(this.currentIndex <= min || _.isNull(this.currentIndex)) {
                this.currentIndex = max;
            } else {
                this.currentIndex--;
            }
            this.select(this.options[this.currentIndex]);
        },
        onBlur($event) {
            if(this.options.length) {
                if(_.isNull(this.value)) {
                    this.currentIndex = 0;
                    this.select(this.options[this.currentIndex]);
                } else {
                    this.localValue = this.value.title;
                }
            }
            if(!_.isNull($event.relatedTarget)) {
                this.showOptions = false;
            }
        },
        clear() {
            this.options = [];
            this.localValue = null;
            this.$emit('input', null);
        },
        onClear() {
            this.$emit('clear');
        }
    }
}
</script>

<style lang="css" scoped>

</style>
