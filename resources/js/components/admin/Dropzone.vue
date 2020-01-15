<template>
    <div class="form-group">
        <vue-dropzone ref="dropzone"
            id="dropzone"
            :options="dropzoneConf"
            v-on:vdropzone-file-added="fileAdded"
            v-on:vdropzone-removed-file="fileRemoved"
        ></vue-dropzone>
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
                addRemoveLinks: true,
            },
            files: {
                added: [],
                removed: [],
            }
        }
    },
    props: {
        value: {
            type: Array,
            default: () => {
                return [];
            }
        },
        media: {
            type: Array,
            default: () => {
                return [];
            }
        }
    },
    components: {
        vueDropzone: vue2Dropzone
    },
    mounted() {
        if(this.media.length) {
            this.media.forEach(item => {
                this.$refs.dropzone.manuallyAddFile(item, item.full_url);
            });
        }
    },
    methods: {
        fileAdded(file) {
            if(file.id) return;

            var formData = new FormData();
            formData.append('file', file)
            axios.post('/admin/files', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    this.updateInput(response.data.path, file);
                })
        },
        updateInput(path, file) {
            this.files.added.push(path);
            file.path = path;
            this.$emit('input', this.files);
        },
        fileRemoved(file) {
            if(file.id) {
                this.files.removed.push(file.id);
            }
            this.files.added = this.files.added.filter(path => path != file.path);
            this.$emit('input', this.files);
        }
    }
}
</script>

<style lang="css" scoped>
</style>
