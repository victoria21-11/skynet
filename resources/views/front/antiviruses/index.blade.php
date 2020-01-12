@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="row">
            @foreach($antiviruses as $antivirus)
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                {{ $antivirus->title }}
                            </div>
                            <div class="">
                                {{ $antivirus->getMinPrice() }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $antivirus->preview_description }}
                    </div>
                    @component('front.components.likes', [
                        'item' => $antivirus
                    ])
                        @slot('url')
                            {{ $antivirus->getUrl() }}
                        @endslot
                    @endcomponent
                </div>
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
