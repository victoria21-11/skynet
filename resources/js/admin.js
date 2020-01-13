require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

Vue.component('tariffs-index', require('./components/admin/tariffs/index.js').default);
Vue.component('tariffs-edit', require('./components/admin/tariffs/edit.js').default);
Vue.component('tariffs-create', require('./components/admin/tariffs/create.js').default);

Vue.component('tariff-groups-index', require('./components/admin/tariff_groups/index.js').default);
Vue.component('tariff-groups-edit', require('./components/admin/tariff_groups/edit.js').default);
Vue.component('tariff-groups-create', require('./components/admin/tariff_groups/create.js').default);

Vue.component('tariff-types-index', require('./components/admin/tariff_types/index.js').default);
Vue.component('tariff-types-edit', require('./components/admin/tariff_types/edit.js').default);
Vue.component('tariff-types-create', require('./components/admin/tariff_types/create.js').default);

const app = new Vue({
    el: '#app'
});
