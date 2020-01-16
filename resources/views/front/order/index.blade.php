@extends('front.layouts.app')

@section('content')

<order-index :tariff-groups="{{ $tariffGroups }}" inline-template>
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Улица" v-model="street" @input="searchStreets">
                    <div class="">
                        <div class="" v-for="street in streets" @click="selectStreet( street )">
                            @{{ street.title }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Дом" v-model="house" @input="searchHouses">
                    <div class="">
                        <div class="" v-for="house in houses" @click="selectHouse( house )">
                            @{{ house.title }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Телефон" v-model="phone" @change="phoneChanged">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <slick
              ref="slick"
              :options="{ slidesToShow: 3, arrows: false }">
                <div class="px-2" v-for="group in tariffGroups">
                    <tariff-card :show-modal="showModal" :group="group" :tariff="group.max_period_tariff" />
                </div>
            </slick>
        </div>
        <div class="text-center">
            <button class="btn btn-primary">Готово</button>
        </div>
        <b-modal ref="tariffInfo" :title="tariff.title">
            <div class="">
                <div class="row">
                    <div class="col" v-for="tariff in tariffGroup.tariffs" @click="selectTariff( tariff )">
                        <div class="badge badge-primary">
                            @{{ tariff.period }}
                            @{{ tariff.period_type.title }}
                        </div>
                    </div>
                </div>
                <div v-html="tariff.description"></div>
                <div class="row">
                    <div class="col">
                        @{{ tariff.period }}
                        @{{ tariff.period_type.title }}
                    </div>
                    <div class="col">
                        @{{ tariff.price }}
                    </div>
                </div>
            </div>
        </b-modal>
    </div>
</order-index>
@endsection
