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
        <slick ref="slick"
            :options="{ slidesToShow: 3, arrows: false }">
            @foreach($services as $item)
            <div class="px-2">
                @include('front.services.card', [
                    'item' => $item
                ])
            </div>
            @endforeach
        </slick>
    </div>
</div>
@elseif($child->url == 'antiviruses')
<div class="card mb-3 bg-transparent">
    <div class="card-header">
        Антивирусная защита
    </div>
    <div class="card-body">
        <slick ref="slick"
            :options="{ slidesToShow: 3, arrows: false }">
            @foreach($antiviruses as $item)
            <div class="px-2">
                @include('front.antiviruses.card', [
                    'antivirus' => $item
                ])
            </div>
            @endforeach
        </slick>
    </div>
</div>
@elseif($child->url == 'equipments')
@else
<div class="card mb-3 bg-transparent">
    <div class="card-header">
        {{ $child->title }}
    </div>
    <div class="card-body">
        <slick ref="slick"
            :options="{ slidesToShow: 3, arrows: false }">
            @foreach($child->posts as $post)
            <div class="px-2">
                @include('front.posts.card', [
                  'post' => $post
                ])
            </div>
            @endforeach
        </slick>
    </div>
</div>
@endif
@endforeach

@endsection
