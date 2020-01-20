@extends('front.layouts.app')

@section('content')

<div class="section">
    <div class="section-header">
        Новости
    </div>
    <div class="section-body">
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
