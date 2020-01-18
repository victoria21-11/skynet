@extends('front.layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                {{ $jobopening->title }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div class="h3">
                            Требования к кандидату
                        </div>
                        {!! $jobopening->requirements !!}
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="h3">
                            Должностные обязанности
                        </div>
                        {!! $jobopening->responsibilities !!}
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="h3">
                            Плюсом будет:
                        </div>
                        {!! $jobopening->extra !!}
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="h3">
                            Условия работы
                        </div>
                        {!! $jobopening->conditions !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <span class="badge badge-success">1</span>
                Изучите вакансии
            </div>
            <div class="card-body">
                <p>
                    Ознакомьтесь с <a href="{{ url('/about/job_openings') }}">вакансиями</a> нашей компании и выберите ту, которая подходит именно вам!
                </p>
                <p>
                    Если по каким-то причинам Вы не нашли подходящей для вас вакансии, отправьте нам своё резюме <a href="mailto:job@sknt.ru">на электронную почту</a> с указанием интересующей позиции.
                </p>
                <p>
                    Мы обязательно рассмотрим его и обратимся к Вам при возникновении интересных и подходящих вариантов работы.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Отправить резюме
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" placeholder="Какая вакансия вас интересует?" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Имя" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Дата рождения" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="phone" placeholder="Телефон" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" placeholder="Почта" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Образование" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Последний опыт работы" class="form-control">
                                </div>
                                <div class="">
                                    Резюме
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Комментарий"></textarea>
                                </div>
                                <hr>
                                <div class="">
                                    <span class="text-danger">*</span> - обязательно для заполнения
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">
                                        С <a href="#">условиями</a> сбора и обработки персональных данных ознакомлен и согласен
                                    </label>
                                </div>
                                <button type="button" class="btn btn-primary btn-block">Отправить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Отдел персонала
                            </div>
                            <div class="card-body">
                                <p>
                                    Санкт-Петербург, улица Репищева, дом 20 (Ближайшие станции метро Удельная, Пионерская, Комендантский проспект) (<a href="#">посмотреть на карте</a>)
                                </p>
                                <div class="h5">
                                    {{ env('PHONE') }} (доб.211)
                                </div>
                                <div class="h5">
                                    +7 (904) 516-22-88
                                </div>
                                <div class="h5">
                                    <a href="mailto:job@sknt.ru">info@sknt.ru</a>
                                </div>
                                <p>
                                    Отправляя свое резюме по электронной почте, обязательно укажите адрес проживания и ваши контактные данные.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <span class="badge badge-success">2</span>
                Заявите о себе
            </div>
            <div class="card-body">
                <p>
                    Отправьте нам своё резюме с помощью нашей формы или свяжитесь с нами по контактному номеру телефона или электронной почте.
                </p>
                <p>
                    В случае, если ваша кандидатура вызовет интерес у Компании, мы свяжемся с вами. В зависимости от уровня позиции Вам предстоит пройти следующие этапы отбора:
                </p>
                <ul>
                    <li>Телефонное интервью</li>
                    <li>Собеседование с рекрутером</li>
                    <li>Встреча с функциональным руководителем</li>
                    <li>Предложение о работе</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-8">
        <div class="row">
            @foreach($tree->childrenTrees as $child)
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $child->section->title }}
                    </div>
                    <div class="card-body">

                    </div>
                    @component('front.components.likes', [
                        'item' => $child->section
                    ])
                        @slot('url')
                            {{ url($child->url) }}
                        @endslot
                    @endcomponent
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <span class="badge badge-success">3</span>
                Приветствуем в команде!
            </div>
            <div class="card-body">
                <p>
                    Кандидаты, успешно прошедшие конкурсный отбор, приглашаются на стажировку/обучение.
                </p>
                <p>
                    Узнайте больше о <a href="{{ url('/about/job_openings/corporate_culture') }}">корпоративной культуре</a> в компании SkyNet и почитайте <a href="{{ url('/about/job_openings/success_stories') }}">истории успеха</a> наших сотрудников.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
