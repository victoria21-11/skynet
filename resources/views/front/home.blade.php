@extends('front.layouts.app')

@section('banner')

<slick ref="slick"
    :options="{ slidesToShow: 1, arrows: false }">
    @foreach($slides as $item)
    <div class="slide_ratio">
        <div class="slide_container" style="background-image: url({{ $item->getFirstMediaUrl('image') }})">
            <div class="container py-4">
                <div class="slide_text p-4">
                    <h1>{{ $item->title }}</h1>
                    {!! $item->description !!}
                    @if($item->link_title)
                    <a role="button" href="{{ $item->link }}" class="btn btn-success btn-block mt-3">{{ $item->link_title }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endforeach
</slick>

@endsection
