@extends('front.layouts.app')

@section('content')

<div class="row">
    @foreach($documents as $document)
    <div class="col-lg-4">
        <div class="ratio_container">
            <div class="card card_default-item mb-3">
                <div class="card-header">
                    {{ $document->title }}
                </div>
                <div class="card-body">

                </div>
                @component('front.components.likes', [
                    'item' => $document
                ])
                    @slot('url')
                        #
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
