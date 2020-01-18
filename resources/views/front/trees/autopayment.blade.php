@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Оплачивать интернет легко
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="">
                            Просто!
                        </div>
                        <div class="">
                            Пополняйте свой счет без утомительного введения данных карты, достаточно один раз зарегистрироваться в системе. Услуга доступна даже при отрицательном балансе.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="">
                            Удобно!
                        </div>
                        <div class="">
                            Обо всех списаниях и автопополнениях мы заранее будем информировать Вас по смс.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="">
                            Быстро!
                        </div>
                        <div class="">
                            Подключив услугу «автопополнение», Вы сможете больше не беспокоиться об оплате интернета.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="">
                            Безопасно!
                        </div>
                        <div class="">
                            Надежность платежей обеспечивается с помощью Банка-эквайера, функционирующего на основе современных протоколов и технологий, разработанных международными платежными системами.
                        </div>
                    </div>
                </div>
                <div class="">
                    Узнать подробности подключения услуги вы можете в <a href="#">«Личном кабинете»</a> в разделе «Оплата банковской картой».
                </div>
            </div>
            @component('front.components.likes', [
                'item' => $section
            ])
                @slot('url')
                    #
                @endslot
            @endcomponent
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                {{ $section->title }}
            </div>
            <div class="card-body">
                {{ $section->description }}
            </div>
        </div>
    </div>
</div>

@endsection
