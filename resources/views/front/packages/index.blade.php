@extends('front.layouts.app')

@section('content')

<div class="row">
    @foreach($packages->slice(0, 2) as $item)
    <div class="col-lg-4">
        @include('front.packages.card', [
            'item' => $item
        ])
    </div>
    @endforeach
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Основные пакеты
            </div>
            <div class="card-body">
                {!! $section->description !!}
            </div>
        </div>
    </div>
    @foreach($packages->slice(2) as $item)
    <div class="col-lg-4">
        @include('front.packages.card', [
            'item' => $item
        ])
    </div>
    @endforeach
</div>

<div class="section">
    <div class="section-header">
        Дополнительные пакеты
    </div>
    <div class="section-body">
        <p>К основным пакетам вы можете выбрать и подключить дополнительные тематические каналы.</p>
        <div class="row">
            @foreach($extra as $item)
            <div class="col-lg-4">
                @include('front.packages.card', [
                    'item' => $item
                ])
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
