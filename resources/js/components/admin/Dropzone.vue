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
            },
            path: []
        }
    },
    props: {
        input: {
            default: () => {
                return [];
            }
        }
    },
    components: {
        vueDropzone: vue2Dropzone
    },
    methods: {
        fileAdded(file) {
            var formData = new FormData();
            formData.append('file', file)
            axios.post('/admin/files', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.path.push(response.data.path);
                    this.$emit('input', this.path);
                })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
