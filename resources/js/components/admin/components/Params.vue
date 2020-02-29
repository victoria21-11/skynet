<template>
  <div class="card mb-3">
      <div class="card-header">
          Параметры
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Имя</th>
                          <th>Название</th>
                          <th>Массив значений</th>
                          <th>Обязательный</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="(item, index) in localParams">
                          <td>
                              <input type="text" class="form-control" v-model="item.name">
                          </td>
                          <td>
                              <input type="text" class="form-control" v-model="item.title">
                          </td>
                          <td>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" v-model="item.multiple">
                              </div>
                          </td>
                          <td>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" v-model="item.required">
                              </div>
                          </td>
                          <td>
                              <button type="button" class="btn btn-danger" @click="remove(index)">
                                  <i class="far fa-trash-alt"></i>
                              </button>
                          </td>
                      </tr>
                      <tr>
                          <td colspan="5">
                              <button type="button" class="btn btn-primary" @click="addParam">
                                  <i class="fas fa-plus"></i>
                              </button>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            localParams: this.params
        }
    },
    props: {
        params: {
            type: Array,
            default: () => {
                return []
            }
        }
    },
    methods: {
        addParam() {
            this.localParams.push({});
        },
        remove(index) {
            this.confirm()
                .then(() => {
                    this.$delete(this.localParams, index);
                });
        }
    }
}
</script>

<style lang="css" scoped>
</style>
