@extends('front.layouts.app')

@section('content')

<div class="row mb-3">
    @foreach($telephones->slice(0, 2) as $item)
    <div class="col-lg-4">
        <div class="ratio_container">
            @include('front.telephones.card', [
                'item' => $item
            ])
        </div>
    </div>
    @endforeach
    <div class="col-lg-4">
    </div>
    @foreach($telephones->slice(2) as $item)
    <div class="col-lg-4">
        <div class="ratio_container">
            @include('front.telephones.card', [
                'item' => $item
            ])
        </div>
    </div>
    @endforeach
</div>

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

@endsection
