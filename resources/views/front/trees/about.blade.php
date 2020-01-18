@extends('front.layouts.app')

@section('content')

<div class="row">
    @foreach($tree->childrenTrees as $item)
    <div class="col-lg-4">
        <div class="ratio_container">
            <div class="card card_default-item mb-3">
                <div class="card-header">
                    {{ $item->section->title }}
                </div>
                <div class="card-body">

                </div>
                @component('front.components.likes', [
                    'item' => $item->section
                ])
                    @slot('url')
                        {{ url($item->url) }}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
