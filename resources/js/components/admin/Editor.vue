<template>
    <div>
        <vue-editor v-model="localValue"
            useCustomImageHandler
            @image-added="handleImageAdded"
        ></vue-editor>
    </div>
</template>
<script>
import { VueEditor } from "vue2-editor";

export default {
    data() {
        return {
            localValue: this.value,

        }
    },
    watch: {
        localValue() {
            this.$emit('input', this.localValue);
        }
    },
    props: {
        value: {}
    },
    components: {
        VueEditor
    },
    methods: {
        handleImageAdded(file, Editor, cursorLocation, resetUploader) {
            const formData = new FormData();
            formData.append('image', file);
            axios.post('/admin/editor_images', formData)
                .then(response => {
                    Editor.insertEmbed(cursorLocation, "image", response.data.url);
                    resetUploader();
                })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
