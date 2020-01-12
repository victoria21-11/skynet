@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                {{ $navigation->title }}
            </div>
            <div class="card-body">
                {{ $navigation->description }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Покдлючиться
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Название компании">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Контактное лицо">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Телефон">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Адрес для подключения">
                </div>
                <div class="form-group">
                    <textarea name="name" class="form-control" placeholder="Комментарий"></textarea>
                </div>
                <hr>
                <div class="">
                    <span class="text-danger">*</span> - обязательно для заполнения
                </div>
                <button type="button" class="btn btn-block btn-outline-success">Отправить</button>
            </div>
        </div>
    </div>
</div>

@endsection
