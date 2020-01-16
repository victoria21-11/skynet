require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
import VueAwesomeSwiper from 'vue-awesome-swiper';

Vue.use(BootstrapVue);
Vue.use(VueAwesomeSwiper);

Vue.component('tariff-card', require('./components/order/TariffCard.vue').default);
Vue.component('order-index', require('./components/order/index.js').default);
Vue.component('like', require('./components/Like.vue').default);

Vue.mixin({
    methods: {

    }
});

const app = new Vue({
    el: '#app'
});
