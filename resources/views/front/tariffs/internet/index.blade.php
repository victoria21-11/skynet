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
        <div class="section mb-3">
            <div class="section-header">
                Дополнительные сервисы
            </div>
            <div class="section-body -mx-2">
                <slick ref="slick"
                    :options="$root.slickOptions">>
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
        <div class="section mb-3">
            <div class="section-header">
                Антивирусная защита
            </div>
            <div class="section-body -mx-2">
                <slick ref="slick"
                    :options="$root.slickOptions">
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
        <div class="section mb-3">
            <div class="section-header">
                {{ $item->section->title }}
            </div>
            <div class="section-body -mx-2">
                <slick ref="slick"
                    :options="$root.slickOptions">>
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
