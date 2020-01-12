@extends('front.layouts.app')

@section('content')

@foreach($navigation->children as $child)
@if($child->url == 'tariffs')
<div class="row">
    @foreach($tariffs as $group)
    <div class="col-lg-4">
        @include('front.tariffs.card', [
            'group' => $group
        ])
    </div>
    @endforeach
</div>
@elseif($child->url == 'services')
<div class="card mb-3 bg-transparent">
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
@elseif($child->url == 'antiviruses')
<div class="card mb-3 bg-transparent">
    <div class="card-header">
        Антивирусная защита
    </div>
    <div class="card-body">
        <swiper :options="{ slidesPerView: 3, spaceBetween: 30, loop: true }">
            @foreach($antiviruses as $item)
            <swiper-slide>
                @include('front.antiviruses.card', [
                    'antivirus' => $item
                ])
            </swiper-slide>
            @endforeach
        </swiper>
    </div>
</div>
@elseif($child->url == 'equipments')
@else
<div class="card mb-3 bg-transparent">
    <div class="card-header">
        {{ $child->title }}
    </div>
    <div class="card-body">
        <swiper :options="{ slidesPerView: 3, spaceBetween: 30, loop: true }">
            @foreach($child->posts as $post)
            <swiper-slide>
                @include('front.posts.card', [
                    'post' => $post
                ])
            </swiper-slide>
            @endforeach
        </swiper>
    </div>
</div>
@endif
@endforeach
@endsection
