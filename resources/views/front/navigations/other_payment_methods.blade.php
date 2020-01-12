@extends('front.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Выберите способ оплаты
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($methods as $item)
            <div class="col-lg-4 mb-3">
                <button type="button" class="btn btn-light btn-block">{{ $item->title }}</button>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
