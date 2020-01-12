@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="row">
            @foreach($equipments as $item)
            <div class="col-lg-6">
                @include('front.equipments.card', [
                    'item' => $item
                ])
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                {{ $navigation->title }}
            </div>
            <div class="card-body">
                {!! $navigation->description !!}
            </div>
        </div>
    </div>
</div>

@endsection
