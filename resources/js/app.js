require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
import VueAwesomeSwiper from 'vue-awesome-swiper';

Vue.use(BootstrapVue);
Vue.use(VueAwesomeSwiper);

Vue.component('tariff-card', require('./components/order/TariffCard.vue').default);
Vue.component('order-index', require('./components/order/index.js').default);

Vue.mixin({
    methods: {
        like($event, type, id) {
            axios.post('/likes', {
                'likeable_type': type,
                'likeable_id': id,
            })
                .then(response => {
                    $event.target.setAttribute('disabled', true);
                    $event.target.childNodes.forEach(item => {
                        if(item.dataset) {
                            item.dataset.count = parseInt(item.dataset.count) + 1;
                            item.innerHTML = item.dataset.count;
                        }
                    });
                });
        }
    }
});

const app = new Vue({
    el: '#app'
});
