@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                {{ $post->title }}
            </div>
            <div class="card-body">
                {{ $post->description }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        
    </div>
</div>


@endsection
