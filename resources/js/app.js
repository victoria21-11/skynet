require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
import VueAwesomeSwiper from 'vue-awesome-swiper';
import Slick from 'vue-slick';

Vue.use(BootstrapVue);
Vue.use(VueAwesomeSwiper, {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true
});

Vue.component('tariff-card', require('./components/order/TariffCard.vue').default);
Vue.component('order-index', require('./components/order/index.js').default);
Vue.component('like', require('./components/Like.vue').default);
Vue.component('slick', Slick);

Vue.mixin({
    methods: {

    }
});

const app = new Vue({
    el: '#app'
});
