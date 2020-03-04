<template>
    <div class="form-group">
        <input type="text"
            class="form-control"
            :placeholder="placeholder"
            v-model="localValue"
            @keyup.down="keyDown"
            @keyup.up="keyUp"
            @input="search">
        <div class="" v-show="showOptions">
            <div class="" :class="{ 'text-primary': currentIndex == index }" v-for="(option, index) in options" @click="select(option, false)">
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
            default: () => {
                return {}
            }
        },
        url: {
            required: true,
            type: String,
            default: ''
        }
    },
    methods: {
        search() {
            if(this.loading) {
                return;
            }
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
            if(this.currentIndex >= this.options.length - 1 || _.isNull(this.currentIndex)) {
                this.currentIndex = 0;
                return;
            }
            this.currentIndex++;
            this.select(this.options[this.currentIndex]);
        },
        keyUp() {
            if(this.currentIndex <= 0 || _.isNull(this.currentIndex)) {
                this.currentIndex = this.options.length - 1;
                return;
            }
            this.currentIndex--;
            this.select(this.options[this.currentIndex]);
        },
    }
}
</script>

<style lang="css" scoped>

</style>
