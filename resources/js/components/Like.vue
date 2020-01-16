<template>
    <button type="button"
        name="button"
        class="btn btn-link like"
        :disabled="disabled"
        @click="like()">
        <i class="fas fa-heart"></i>
        <span class="likes_count">
            {{ localCount }}
        </span>
    </button>
</template>
<script>

export default {
    data() {
        return {
            localCount: parseInt(this.count),
            disabled: Boolean(this.isDisabled)
        }
    },
    props: {
        isDisabled: {
            type: [String, Number, Boolean],
            default: false
        },
        itemId: {
            required: true,
            type: [String, Number],
        },
        type: {
            required: true,
            type: String,
        },
        count: {
            required: true,
            type: [String, Number],
        }
    },
    methods: {
        like() {
            axios.post('/likes', {
                'likeable_type': this.type,
                'likeable_id': this.itemId,
            })
                .then(response => {
                    this.localCount += 1;
                    this.disabled = true;
                });
        }
    }
}
</script>

<style lang="css" scoped>
</style>
