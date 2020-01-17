@extends('front.layouts.app')

@section('content')

<div class="card bg-transparent">
    <div class="card-header">
        Новости
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($news as $value)
            <div class="col-lg-4">
                <div class="ratio_container">
                    @include('front.news.card', [
                        'news' => $value
                    ])
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        {{ $news->links() }}
    </div>
</div>

@endsection
