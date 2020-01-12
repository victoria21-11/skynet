@extends('front.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Популярные вопосы
    </div>
    <div class="card-body">
        @foreach($types as $type)
        <h3 class="mb-3">{{ $type->title }}</h3>
        <div class="mb-3">
            @include('front.questions.accordion', [
                'questions' => $type->questions
            ])
        </div>
        @endforeach
    </div>
</div>


@endsection
