@extends('front.layouts.app')

@section('content')

<div class="row">
    @foreach($navigation->children as $child)
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                {{ $child->title }}
            </div>
            <div class="card-body">

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
    @endforeach
</div>

@endsection
