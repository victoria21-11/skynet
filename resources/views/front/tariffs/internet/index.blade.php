@extends('front.layouts.app')

@section('content')

@foreach($tree->childrenTrees as $item)
    @if($item->section->url == 'tariffs')
    <div class="row">
        @foreach($tariffs as $group)
            <div class="col-lg-4">
                <div class="ratio_container">
                    <div class="text">
                        @include('front.tariffs.card', [
                            'group' => $group
                        ])
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @elseif($item->section->url == 'services')
        <div class="card mb-3 bg-transparent">
            <div class="card-header">
                Дополнительные сервисы
            </div>
            <div class="card-body">
                <slick ref="slick"
                    :options="{ slidesToShow: 3, arrows: false }">
                    @foreach($services as $item)
                    <div class="px-2">
                        <div class="ratio_container">
                            @include('front.services.card', [
                                'item' => $item
                            ])
                        </div>
                    </div>
                    @endforeach
                </slick>
            </div>
        </div>
    @elseif($item->section->url == 'antiviruses')
        <div class="card mb-3 bg-transparent">
            <div class="card-header">
                Антивирусная защита
            </div>
            <div class="card-body">
                <slick ref="slick"
                    :options="{ slidesToShow: 3, arrows: false }">
                    @foreach($antiviruses as $item)
                    <div class="px-2">
                        <div class="ratio_container">
                            @include('front.antiviruses.card', [
                                'antivirus' => $item
                            ])
                        </div>
                    </div>
                    @endforeach
                </slick>
            </div>
        </div>
    @elseif($item->section->url == 'equipments')
    @else
        <div class="card mb-3 bg-transparent">
            <div class="card-header">
                {{ $item->section->title }}
            </div>
            <div class="card-body">
                <slick ref="slick"
                    :options="{ slidesToShow: 3, arrows: false }">
                    {{-- @foreach($item->section->posts as $post)
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
