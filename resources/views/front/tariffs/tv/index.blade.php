@extends('front.layouts.app')

@section('content')

@foreach($navigation->children as $child)
@if($child->url == 'tariffs')
<div class="row">
    @foreach($tariffs as $group)
    <div class="col-lg-4">
        <div class="ratio_container">
            @include('front.tariffs.card', [
                'group' => $group
            ])
        </div>
    </div>
    @endforeach
</div>
@elseif($child->url == 'packages')
<div class="card bg-transparent mb-3">
    <div class="card-header">
        Дополнительные пакеты
    </div>
    <div class="card-body">
        <slick ref="slick"
            :options="{ slidesToShow: 3, arrows: false }">
            @foreach($packages as $item)
            <div class="px-2">
                <div class="ratio_container">
                    <div class="card card_default-item">
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
                </div>
            </div>
            @endforeach
        </slick>
    </div>
</div>
@else
<div class="card bg-transparent mb-3">
    <div class="card-header">
        {{ $child->title }}
    </div>
    <div class="card-body">
        <slick ref="slick"
            :options="{ slidesToShow: 3, arrows: false }">
            @foreach($child->posts as $post)
            <div class="px-2">
                <div class="ratio_container">
                    @include('front.posts.card', [
                        'post' => $post
                    ])
                </div>
            </div>
            @endforeach
        </slick>
    </div>
</div>
@endif
@endforeach
@endsection
