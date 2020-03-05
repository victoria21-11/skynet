@extends('front.layouts.app')

@section('content')

<order-index :tariff-groups="{{ $tariffGroups }}" inline-template>
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <search-select ref="street"
                    url="/streets"
                    v-on:clear="onClearStreet"
                    v-model="street"
                    placeholder="Улица"></search-select>

                <search-select ref="house"
                    url="/streets/1/houses"
                    :readonly="!street"
                    placeholder="Дом"></search-select>

                <phone-input v-model="phone" v-on:change="onChangePhone"></phone-input>
            </div>
        </div>
        <div class="mb-3">
            <slick
              ref="slick"
              :options="$root.slickOptions">>
                <div class="px-2" v-for="(group, index) in tariffGroups" @click="toTariff(index)">
                    <tariff-card :show-modal="showModal" :group="group" :tariff="group.max_period_tariff" />
                </div>
            </slick>
        </div>
        <promocode></promocode>
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
