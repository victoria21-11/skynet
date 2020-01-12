@extends('front.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Новости
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($news as $value)
            <div class="col-lg-4">
                @include('front.news.card', [
                    'news' => $value
                ])
            </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        {{ $news->links() }}
    </div>
</div>

@endsection
