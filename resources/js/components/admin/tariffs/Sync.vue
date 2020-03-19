<template>
    <div class="">
        <div class="mb-3">
            <button type="button" class="btn btn-outline-secondary" @click="filterByChanged">Показать только измененные</button>
        </div>
        <div class="" v-for="tariff in billData">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="20%">
                            <span class="text-primary">
                                Bill
                            </span>
                            <span class="text-success">
                                Local
                            </span>
                        </th>
                        <th width="40%" class="text-primary">Bill</th>
                        <th width="40%" class="text-success">Local</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in tariff">
                        <th>
                            <div class="text-primary">
                                {{ item.billField }}
                            </div>
                            <div class="text-success">
                                {{ item.localField }}
                            </div>
                        </th>
                        <td>{{ item.billValue }}</td>
                        <td :class="{ 'bg-warning': changed(item) }">{{ item.localValue }}</td>
                        <td>
                            <button v-if="item.id" @click="syncOne(item)" type="button" class="btn btn-sm btn-primary">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">
                            <button type="button" class="btn btn-sm btn-primary" @click="syncAll(tariff)">
                                Перенести все изменения
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            billData: [],
        }
    },
    methods: {
        getData() {
            axios.get(`/admin/tariffs/sync`)
                .then((response) => {
                    this.billData = response.data.data;
                });
        },
        changed(item) {
            return item.localValue && item.localValue != item.billValue;
        },
        syncAll(tariff) {
            let data = {};
            tariff.forEach(item => {
                data.id = item.id;
                data[item.localField] = item.billValue;
            });
            if(data.id) {
                this.update(data)
                    .then(() => {
                        this.onSuccess(tariff);
                    });
            } else {
                this.create(data)
                    .then(() => {
                        this.onSuccess(tariff);
                    });
            }

        },
        syncOne(item) {
            let data = {};
            data.id = item.id;
            data[item.localField] = item.billValue;
            this.update(data)
                .then(response => {
                    item.localValue = item.billValue;
                });
        },
        onSuccess(data) {
            data.forEach(item => {
                item.localValue = item.billValue;
            });
        },
        update(data) {
            return new Promise((resolve, reject) => {
                axios.put(`/admin/tariffs/${data.id}/sync`, data)
                    .then((response) => {
                        resolve();
                    });
            });
        },
        create(data) {
            return new Promise((resolve, reject) => {
                axios.post(`/admin/tariffs/sync`, data)
                    .then((response) => {
                        resolve();
                    });
            });
        },
        filterByChanged() {
            this.billData.filter(item => {
                console.log(item);
            });
        }
    }
}
</script>

<style lang="css" scoped>
</style>
