@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        @foreach($antiviruses as $antivirus)
        <div class="card mb-3">
            <div class="card-header">
                {{ $antivirus->title }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="">
                            <div class="">
                                <img src="{{ $antivirus->preview }}" class="img-fluid" alt="">
                            </div>
                            tags
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @foreach($antivirus->periods as $period)
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="">
                                    {{ $period->period }}
                                </div>
                                <div class="">
                                    {{ $period->description }}
                                </div>
                            </div>
                            <div class="col-lg-6 text-right">
                                <div class="">
                                    {{ $period->price }}
                                </div>
                                <div class="">
                                    <button type="button" name="button" class="btn btn-success">Подключить</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="">
                            {!! $antivirus->description !!}
                        </div>
                    </div>
                </div>
            </div>
            @component('front.components.likes', [
                'item' => $antivirus
            ])
                @slot('url')
                    #
                @endslot
            @endcomponent
        </div>
        <div class="card mb-3">
            <div class="card-body">
                {{ $antivirus->extra }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                {{ $antivirusType->title }}
            </div>
            <div class="card-body">
                {!! $antivirusType->description !!}
            </div>
        </div>
    </div>
</div>

@endsection
