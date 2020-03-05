import SearchSelect from './SearchSelect.vue';
import PhoneInput from './PhoneInput.vue';
import Promocode from './Promocode.vue';

export default {
    data() {
        return {
            tariff: {
                period_type: {}
            },
            tariffGroup: {},
            phone: null,
            order: null,
            street: null,
            house: null,
            loading: false,
            selected: {
            },
            swiperOptions: {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
            }
        }
    },
    components: {
        SearchSelect,
        PhoneInput,
        Promocode
    },
    props: {
        tariffGroups: {
            required: true,
            type: Array,
            default: () => {
                return [];
            }
        }
    },
    mounted() {
        const cloned = document.getElementsByClassName('slick-cloned');
        Array.from(cloned).forEach((item, index) => item.addEventListener('click', () => this.toTariff(index + this.tariffGroups.length)));
    },
    methods: {
        showModal(tariffGroup) {
            this.tariffGroup = tariffGroup;
            this.tariff = this.tariffGroup.max_period_tariff;
            this.$refs.tariffInfo.show();
        },
        onChangePhone() {
            if(this.order) {
                this.updateOrder();
            } else {
                this.createOrder();
            }
        },
        createOrder() {
            axios.post('/orders', {
                phone: this.phone,
                house_id: this.getHouseID()
            })
                .then(response => {
                    this.order = response.data.order;
                });
        },
        updateOrder() {
            axios.put('/orders/' + this.order.id, {
                phone: this.phone,
                house_id: this.getHouseID()
            })
                .then(response => {
                    this.order = response.data.order;
                });
        },
        getHouseID() {
            if( this.selected.house ) {
                return this.selected.house.id;
            }
            return null;
        },
        selectTariff(tariff) {
            this.tariff = tariff;
        },
        toTariff(index) {
            const currentIndex = this.$refs.slick.currentSlide();
            if(index > currentIndex) {
                this.$refs.slick.next();
            } else {
                this.$refs.slick.prev();
            }
        },
        onClearStreet() {
            this.$refs.house.clear();
        }
    },
}
