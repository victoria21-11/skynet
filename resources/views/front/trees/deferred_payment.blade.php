@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Варианты использования услуги
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="">
                            На 1 день
                        </div>
                        <div class="">
                            Позволяет возобновить доступ в Интернет на 24 часа.
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="">
                            На 5 дней
                        </div>
                        <div class="">
                            Позволяет возобновить доступ в Интернет на 5 суток. Услуга платная— 30 руб.
                        </div>
                    </div>

                </div>
                <div class="">
                    Услугу «Отложенный платеж» можно подключить самостоятельно в <a href="#">«Личном кабинете»</a> или с помощью оператора Контакт-центра по тел. +7 (812) 386-20-20.
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
