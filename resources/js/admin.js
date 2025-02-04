import BootstrapVue from 'bootstrap-vue';
import VueFlatPickr from 'vue-flatpickr-component';
import VueQuillEditor from 'vue-quill-editor';

require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');

Object.defineProperty(Vue.prototype, '$_', { value: _ });

Vue.use(BootstrapVue);
Vue.use(VueFlatPickr);
Vue.use(VueQuillEditor, {});

Vue.component('editor', require('./components/admin/Editor.vue').default);
Vue.component('dropzone', require('./components/admin/Dropzone.vue').default);
Vue.component('search-select', require('./components/admin/SearchSelect.vue').default);
Vue.component('navigation', require('./components/admin/trees/Navigation.vue').default);
Vue.component('tree', require('./components/admin/trees/Tree.vue').default);

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

Vue.component('sections-index', require('./components/admin/sections/index.js').default);
Vue.component('sections-edit', require('./components/admin/sections/edit.js').default);
Vue.component('sections-create', require('./components/admin/sections/create.js').default);

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

Vue.component('news-index', require('./components/admin/news/index.js').default);
Vue.component('news-edit', require('./components/admin/news/edit.js').default);
Vue.component('news-create', require('./components/admin/news/create.js').default);

Vue.component('telephones-index', require('./components/admin/telephones/index.js').default);
Vue.component('telephones-edit', require('./components/admin/telephones/edit.js').default);
Vue.component('telephones-create', require('./components/admin/telephones/create.js').default);

Vue.component('services-index', require('./components/admin/services/index.js').default);
Vue.component('services-edit', require('./components/admin/services/edit.js').default);
Vue.component('services-create', require('./components/admin/services/create.js').default);

Vue.component('period-types-index', require('./components/admin/period_types/index.js').default);
Vue.component('period-types-edit', require('./components/admin/period_types/edit.js').default);
Vue.component('period-types-create', require('./components/admin/period_types/create.js').default);

Vue.component('posts-index', require('./components/admin/posts/index.js').default);
Vue.component('posts-edit', require('./components/admin/posts/edit.js').default);
Vue.component('posts-create', require('./components/admin/posts/create.js').default);

Vue.component('payment-methods-index', require('./components/admin/payment_methods/index.js').default);
Vue.component('payment-methods-edit', require('./components/admin/payment_methods/edit.js').default);
Vue.component('payment-methods-create', require('./components/admin/payment_methods/create.js').default);

Vue.component('packages-index', require('./components/admin/packages/index.js').default);
Vue.component('packages-edit', require('./components/admin/packages/edit.js').default);
Vue.component('packages-create', require('./components/admin/packages/create.js').default);

Vue.component('slides-index', require('./components/admin/slides/index.js').default);
Vue.component('slides-edit', require('./components/admin/slides/edit.js').default);
Vue.component('slides-create', require('./components/admin/slides/create.js').default);

Vue.component('orders-index', require('./components/admin/orders/index.js').default);
Vue.component('orders-edit', require('./components/admin/orders/edit.js').default);
Vue.component('orders-create', require('./components/admin/orders/create.js').default);

Vue.component('global-settings-index', require('./components/admin/global_settings/index.js').default);
Vue.component('global-settings-edit', require('./components/admin/global_settings/edit.js').default);
Vue.component('global-settings-create', require('./components/admin/global_settings/create.js').default);

Vue.component('social-networks-index', require('./components/admin/social_networks/index.js').default);
Vue.component('social-networks-edit', require('./components/admin/social_networks/edit.js').default);
Vue.component('social-networks-create', require('./components/admin/social_networks/create.js').default);

Vue.component('success-stories-index', require('./components/admin/success_stories/index.js').default);
Vue.component('success-stories-edit', require('./components/admin/success_stories/edit.js').default);
Vue.component('success-stories-create', require('./components/admin/success_stories/create.js').default);

Vue.component('components-index', require('./components/admin/components/index.js').default);
Vue.component('components-edit', require('./components/admin/components/edit.js').default);
Vue.component('components-create', require('./components/admin/components/create.js').default);

Vue.component('layouts-index', require('./components/admin/layouts/index.js').default);
Vue.component('layouts-edit', require('./components/admin/layouts/edit.js').default);
Vue.component('layouts-create', require('./components/admin/layouts/create.js').default);

Vue.component('profile-index', require('./components/admin/profile/index.js').default);

Vue.mixin({
    methods: {
        confirm() {
            return new Promise((resolve, reject) => {
                const noty = new Noty({
                    type: 'warning',
                    text: 'Подтверждаете действие?',
                    buttons: [
                        Noty.button('Да', 'btn btn-success', () => {
                            noty.close();
                            resolve();
                        }),
                        Noty.button('Нет', 'btn btn-danger', () => {
                            noty.close();
                            // reject();
                        }),
                    ],
                });
                noty.show();
            });
        },
    },
});

const app = new Vue({
    el: '#app',
    data() {
        return {
            flatpickrConf: {
                mode: 'range',
                dateFormat: 'd.m.Y',
            },
        };
    },
});
