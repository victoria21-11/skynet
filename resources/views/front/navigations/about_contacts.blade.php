@extends('front.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Контактная информация
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <p>Желаете пообщаться вживую?</p>
                <p>Мы будем рады видеть вас в центрах обслуживания абонентов!</p>
                <p>
                    Здесь вы можете получить консультацию наших специалистов, ознакомиться с правилами оказания телематических услуг связи, подобрать наиболее выгодный тарифный план, а также приобрести оборудование и протестировать цифровое телевидение нового поколения:
                </p>
            </div>
            <div class="col-lg-4">
                <div class="">
                    Звоните: {{ env('PHONE') }}
                </div>
                <div class="">
                    Пишите: <a href="mailto:info@sknt.ru">info@sknt.ru</a>
                </div>
                <div class="">
                    Приходите:
                </div>
                <div class="h5 font-weight-bold">
                    СПб, улица Репищева д. 20, БЦ SkyTrade 4 этаж
                </div>
                <div class="">
                    ст. м. Удельная, Пионерская, Комендантский проспект
                </div>
                <div class="h5">
                    <div class="">
                        ежедневно
                    </div>
                    <div class="">
                        10:00–21:00
                    </div>
                </div>
                <div class="h5">
                    <div class="">
                        обеденный перерыв
                    </div>
                    <div class="">
                        16:00–16:30
                    </div>
                </div>
                <div class="">
                    <a target="_blank" href="https://yandex.ru/maps/2/saint-petersburg/?ll=30.284208%2C60.031607&z=16&text=%D0%A0%D0%B5%D0%BF%D0%B8%D1%89%D0%B5%D0%B2%D0%B0%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%2C%2020&sll=30.284966%2C60.031751&sspn=0.046048%2C0.009845&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fll%3D30.285%252C60.032%26spn%3D0.001%252C0.001%26text%3D%25D0%25A0%25D0%25BE%25D1%2581%25D1%2581%25D0%25B8%25D1%258F%252C%2520%25D0%25A1%25D0%25B0%25D0%25BD%25D0%25BA%25D1%2582-%25D0%259F%25D0%25B5%25D1%2582%25D0%25B5%25D1%2580%25D0%25B1%25D1%2583%25D1%2580%25D0%25B3%252C%2520%25D0%25A0%25D0%25B5%25D0%25BF%25D0%25B8%25D1%2589%25D0%25B5%25D0%25B2%25D0%25B0%2520%25D1%2583%25D0%25BB%25D0%25B8%25D1%2586%25D0%25B0%252C%252020">Открыть на карте</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
