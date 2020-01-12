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
@elseif($child->url == 'packages')
<div class="card mb-3">
    <div class="card-header">
        Дополнительные пакеты
    </div>
    <div class="card-body">
        <swiper :options="{ slidesPerView: 3, spaceBetween: 30, loop: true }">
            @foreach($packages as $item)
            <swiper-slide>
                <div class="card">
                    <div class="card-header">
                        {{ $item->title }}
                    </div>
                    <div class="card-body">
                        {{ $item->description }}
                    </div>
                    @component('front.components.likes', [
                        'item' => $item
                    ])
                        @slot('url')
                            {{ url('packages/' . $item->id) }}
                        @endslot
                    @endcomponent
                </div>
            </swiper-slide>
            @endforeach
        </swiper>
    </div>
</div>
@else
<div class="card mb-3">
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
