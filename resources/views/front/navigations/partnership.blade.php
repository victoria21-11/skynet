@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="row">
            @foreach($navigation->children as $child)
            <div class="col-lg-6">
                <div class="ratio_container">
                    <div class="card card_default-item mb-3">
                        <div class="card-header">
                            {{ $child->title }}
                        </div>
                        <div class="card-body">
                            {{ $child->description }}
                        </div>
                        @component('front.components.likes', [
                            'item' => $child
                        ])
                            @slot('url')
                                {{ url($child->pivot->url) }}
                            @endslot
                        @endcomponent
                    </div>
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
