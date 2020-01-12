@extends('front.layouts.app')

@section('content')

<div class="row">
    @foreach($tariffs as $group)
    <div class="col-lg-4">
        @include('front.tariffs.card', [
            'group' => $group
        ])
    </div>
    @endforeach
</div>

@endsection
