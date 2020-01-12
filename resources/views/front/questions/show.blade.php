@extends('front.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        {{ $question->title }}
    </div>
    <div class="card-body">
        {{ $question->description }}
        <div class="">
            <a href="{{ url('business/contacts') }}">Перейти к другим вопросам</a>
        </div>
    </div>
</div>

@endsection
