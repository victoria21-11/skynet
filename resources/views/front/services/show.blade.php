@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                {{ $service->title }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="">
                            tags
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right">
                            <a href="{{ $service->url }}" target="_blank" class="btn btn-primary">Подключить</a>
                        </div>
                        <div class="">
                            {{ $service->description }}
                        </div>
                    </div>
                </div>
            </div>
            @component('front.components.likes', [
                'item' => $service
            ])
                @slot('url')
                    #
                @endslot
            @endcomponent
        </div>
        <div class="card mb-3">
            <div class="card-body">
                {{ $service->extra }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>

@endsection
