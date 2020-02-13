export default {
    data() {
        return {
            tariff: {
                period_type: {}
            },
            tariffGroup: {},
            phone: null,
            order: null,
            streets: [],
            houses: [],
            street: null,
            house: null,
            loading: false,
            selected: {
                street: null,
                house: null
            },
            swiperOptions: {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
            }
        }
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
        phoneChanged() {
            if(this.phone) {
                if(this.phone.length == 11) {
                    if(this.order) {
                        this.updateOrder();
                    } else {
                        this.createOrder();
                    }
                }
            }
        },
        createOrder() {
            axios.post('orders', {
                phone: this.preparePhone(),
                house_id: this.getHouseID()
            })
                .then(response => {
                    this.order = response.data.order;
                });
        },
        updateOrder() {
            axios.put('orders/' + this.order.id, {
                phone: this.preparePhone(),
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
        preparePhone() {
            var phone = this.phone;
            phone = phone.substr(1);
            return phone;
        },
        searchStreets() {
            if(this.loading) {
                return;
            }
            if(!this.street) {
                this.selected.street = null;
                this.selected.house = null;
                this.house = null;
                return;
            }
            this.loading = true;
            axios.get('streets', {
                params: {
                    title: this.street
                }
            })
                .then(response => {
                    this.streets = response.data.streets
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        searchHouses() {
            if(this.loading || !this.selected.street || !this.selected.street.id) {
                return;
            }
            if(!this.house) {
                this.selected.house = null;
                return;
            }
            this.loading = true;
            axios.get('streets/' + this.selected.street.id + '/houses', {
                params: {
                    title: this.house
                }
            })
                .then(response => {
                    this.houses = response.data.houses
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        selectStreet(street) {
            this.selected.street = street;
            this.street = street.title;
            this.streets = [];

            this.selected.house = null;
            this.house = null;
        },
        selectHouse(house) {
            this.selected.house = house;
            this.house = house.title;
            this.houses = [];
            if(this.order) {
                this.updateOrder();
            }
        },
        selectTariff(tariff) {
            this.tariff = tariff;
        },
        toTariff(index) {
            const currentIndex = this.$refs.slick.currentSlide();
            console.log(index, currentIndex);
            if(index > currentIndex) {
                this.$refs.slick.next();
            } else {
                this.$refs.slick.prev();
            }
        }
    }
}
