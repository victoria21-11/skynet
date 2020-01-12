@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        Устаревшие тарифы вы можете просмотреть в формате PDF
                    </div>
                    <div class="col-lg-6">
                        <a role="button" class="btn btn-block btn-outline-success">Ознакомиться</a>
                    </div>
                </div>
            </div>
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
