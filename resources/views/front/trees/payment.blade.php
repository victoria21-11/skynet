@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Выберите способ оплаты
            </div>
            <div class="card-body">
                @foreach($methods as $item)
                <button class="btn btn-light btn-block">
                    {{ $item->title }}
                </button>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Название
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Номер договора (ID), на который поступят деньги:</label>
                    <input type="text" class="form-control" placeholder="Номер договора ID">
                    <div class="small text-right">
                        например, 201123
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Сумма оплаты">
                    <div class="small text-right">
                        мин. платеж 10 руб., макс. 10.000 руб.
                    </div>
                </div>
                <button type="button" class="btn btn-block btn-outline-success">Продолжить</button>
                <div class="">
                    Нажимая кнопку «продолжить» вы соглашаетесь с условиями <a href="#">пользовательского соглашения</a>.
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        Описание
    </div>
</div>


@endsection
