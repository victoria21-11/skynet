@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="row">
            @foreach($tree->childrenTrees as $child)
            <div class="col-lg-6">
                <div class="ratio_container">
                    <div class="card card_default-item mb-3">
                        <div class="card-header">
                            {{ $child->section->title }}
                        </div>
                        <div class="card-body">
                            {{ $child->section->description }}
                        </div>
                        @component('front.components.likes', [
                            'item' => $child->section
                        ])
                            @slot('url')
                                {{ url($child->url) }}
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
                {{ $tree->section->title }}
            </div>
            <div class="card-body">
                {!! $tree->section->description !!}
            </div>
        </div>
    </div>
</div>

@endsection
