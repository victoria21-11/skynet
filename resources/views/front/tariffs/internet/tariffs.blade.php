@extends('front.layouts.app')

@section('content')

<div class="row">
    @foreach($tariffs->slice(0, 2) as $group)
    <div class="col-lg-4">
        @include('front.tariffs.card', [
            'group' => $group
        ])
    </div>
    @endforeach
    <div class="col-lg-4">
        {!! $section->description !!}
    </div>
    @foreach($tariffs->slice(2) as $group)
    <div class="col-lg-4">
        @include('front.tariffs.card', [
            'group' => $group
        ])
    </div>
    @endforeach
</div>

@endsection
