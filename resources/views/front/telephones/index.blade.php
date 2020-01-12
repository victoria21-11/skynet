@extends('front.layouts.app')

@section('content')

<div class="row mb-3">
    @foreach($telephones->slice(0, 2) as $item)
    <div class="col-lg-4">
        @include('front.telephones.card', [
            'item' => $item
        ])
    </div>
    @endforeach
    <div class="col-lg-4">
    </div>
    @foreach($telephones->slice(2) as $item)
    <div class="col-lg-4">
        @include('front.telephones.card', [
            'item' => $item
        ])
    </div>
    @endforeach
</div>

<div class="card mb-3">
    <div class="card-header">
        Дополнительные сервисы
    </div>
    <div class="card-body">
        <swiper :options="{ slidesPerView: 3, spaceBetween: 30, loop: true }">
            @foreach($services as $item)
            <swiper-slide>
                @include('front.services.card', [
                    'item' => $item
                ])
            </swiper-slide>
            @endforeach
        </swiper>
    </div>
</div>

@endsection
