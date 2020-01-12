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
        @foreach($post->navigation->posts as $item)
        @if($item->id != $post->id)
        @include('front.posts.card', [
            'post' => $item
        ])
        @endif
        @endforeach
    </div>
</div>


@endsection
