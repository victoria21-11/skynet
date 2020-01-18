@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Популярные вопросы
            </div>
            <div class="card-body">
                @include('front.questions.accordion', [
                    'questions' => $questions
                ])
            </div>
            <div class="card-footer">
                <a href="{{ url('/home/contacts/faq') }}">Перейти к другим вопросам</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                {{ $section->title }}
            </div>
            <div class="card-body">
                {{ $section->description }}
                <div class="">
                    <p class="mb-0">
                        У вас есть вопрос или вы хотите что-то уточнить?
                    </p>
                    <p>
                        Начните диалог с оператором в режиме онлайн!
                    </p>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="#" role="button" class="btn btn-link btn-lg">
                            <i class="fab fa-vk"></i>
                        </a>
                        <a href="#" role="button" class="btn btn-link btn-lg">
                            <i class="fab fa-telegram-plane"></i>
                        </a>
                        <a href="#" role="button" class="btn btn-link btn-lg">
                            <i class="fab fa-viber"></i>
                        </a>
                        <a href="#" role="button" class="btn btn-link btn-lg">
                            <i class="fas fa-comments"></i>
                        </a>
                    </div>
                    <div class="">
                        <p class="h5 text-center">Круглосуточный контактный центр</p>
                        <p class="h1 text-center">
                            {{ env('PHONE') }}
                        </p>
                        <p class="h5 text-center">
                            Электронная почта:
                            <a href="mailto:info@sknt.ru">info@sknt.ru</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
