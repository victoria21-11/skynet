@extends('front.layouts.app')

@section('content')

@foreach($tree->childrenTrees as $item)
    @if($item->section->url == 'tariffs')
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
    @elseif($item->section->url == 'packages')
        <div class="section mb-3">
            <div class="section-header">
                Дополнительные пакеты
            </div>
            <div class="section-body -mx-2">
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
        <div class="section mb-3">
            <div class="section-header">
                {{ $item->section->title }}
            </div>
            <div class="section-body -mx-2">
                <slick ref="slick"
                    :options="{ slidesToShow: 3, arrows: false }">
                    {{-- @foreach($item->posts as $post)
                    <div class="px-2">
                        <div class="ratio_container">
                            @include('front.posts.card', [
                                'post' => $post
                            ])
                        </div>
                    </div>
                    @endforeach --}}
                </slick>
            </div>
        </div>
    @endif
@endforeach
@endsection
