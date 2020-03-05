<template>
    <div class="form-group">
        <input type="text" class="form-control" :readonly="applied" v-model="promocode">
        <button type="button" class="btn btn-primary" @click="check">Отправить</button>
        <button type="button" class="btn btn-danger" @click="clear">Очистить</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            promocode: null,
            loading: false,
            applied: null
        }
    },
    methods: {
        check() {
            if(this.loading) {
                return;
            }
            if(this.applied == this.promocode) {
                return;
            }
            this.loading = true;
            axios.post('/orders/promocode/check', {
                promocode: this.promocode
            })
                .then(() => {
                    this.applied = this.promocode;
                })
                .finally(() => {
                    this.loading = false;
                })
        },
        clear() {
            this.applied = null;
            this.promocode = null;
        }
    }
}
</script>

<style lang="css" scoped>
</style>
