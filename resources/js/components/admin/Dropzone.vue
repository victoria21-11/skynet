<template>
    <div class="form-group">
        <vue-dropzone ref="dropzone" id="dropzone" :options="dropzoneConf" v-on:vdropzone-file-added="fileAdded"></vue-dropzone>
    </div>
</template>
<script>
import vue2Dropzone from 'vue2-dropzone';

export default {
    data() {
        return {
            dropzoneConf: {
                url: '/admin/files',
                autoProcessQueue: false,
            }
        }
    },
    components: {
        vueDropzone: vue2Dropzone
    },
    methods: {
        fileAdded() {
            console.log(this.$refs.dropzone.getAcceptedFiles());
            console.log(this.$refs.dropzone.getQueuedFiles());
            console.log(this.$refs.dropzone.getUploadingFiles());
            console.log(this.$refs.dropzone.getRejectedFiles());
        }
    }
}
</script>

<style lang="css" scoped>
</style>
