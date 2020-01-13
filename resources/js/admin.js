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

Vue.component('streets-index', require('./components/admin/streets/index.js').default);
Vue.component('streets-edit', require('./components/admin/streets/edit.js').default);
Vue.component('streets-create', require('./components/admin/streets/create.js').default);

Vue.component('houses-index', require('./components/admin/houses/index.js').default);
Vue.component('houses-edit', require('./components/admin/houses/edit.js').default);
Vue.component('houses-create', require('./components/admin/houses/create.js').default);

Vue.component('questions-index', require('./components/admin/questions/index.js').default);
Vue.component('questions-edit', require('./components/admin/questions/edit.js').default);
Vue.component('questions-create', require('./components/admin/questions/create.js').default);

Vue.component('question-types-index', require('./components/admin/question_types/index.js').default);
Vue.component('question-types-edit', require('./components/admin/question_types/edit.js').default);
Vue.component('question-types-create', require('./components/admin/question_types/create.js').default);

Vue.component('jobopenings-index', require('./components/admin/jobopenings/index.js').default);
Vue.component('jobopenings-edit', require('./components/admin/jobopenings/edit.js').default);
Vue.component('jobopenings-create', require('./components/admin/jobopenings/create.js').default);

Vue.component('equipments-index', require('./components/admin/equipments/index.js').default);
Vue.component('equipments-edit', require('./components/admin/equipments/edit.js').default);
Vue.component('equipments-create', require('./components/admin/equipments/create.js').default);

Vue.component('antiviruses-index', require('./components/admin/antiviruses/index.js').default);
Vue.component('antiviruses-edit', require('./components/admin/antiviruses/edit.js').default);
Vue.component('antiviruses-create', require('./components/admin/antiviruses/create.js').default);

Vue.component('antivirus-periods-index', require('./components/admin/antivirus_periods/index.js').default);
Vue.component('antivirus-periods-edit', require('./components/admin/antivirus_periods/edit.js').default);
Vue.component('antivirus-periods-create', require('./components/admin/antivirus_periods/create.js').default);

Vue.component('antivirus-types-index', require('./components/admin/antivirus_types/index.js').default);
Vue.component('antivirus-types-edit', require('./components/admin/antivirus_types/edit.js').default);
Vue.component('antivirus-types-create', require('./components/admin/antivirus_types/create.js').default);

const app = new Vue({
    el: '#app'
});
