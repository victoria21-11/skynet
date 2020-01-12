@extends('front.layouts.app')

@section('content')

<div class="card mb-3">
    <div class="card-header">
        {{ $news->title }}
    </div>
    <div class="card-body">
        {{ $news->description }}
    </div>
    @component('front.components.likes', [
        'item' => $news
    ])
        @slot('url')
            #
        @endslot
    @endcomponent
</div>

<div class="card">
    <div class="card-header">
        Свежие новости
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($moreNews as $value)
            <div class="col-lg-4">
                @include('front.news.card', [
                    'news' => $value
                ])
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
