@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Стань нашим дилером и зарабатывай вместе с нами!
            </div>
            <div class="card-body">
                <p>
                    Начать зарабатывать со SkyNet очень просто! Заполни анкету и в скором времени с тобой свяжется менеджер, который расскажет все подробности.
                </p>
                <p>
                    Появились вопросы? Пиши нам на почту: <a href="mailto:deal@hub.sknt.ru">deal@hub.sknt.ru</a>
                </p>
                <div class="row">
                    <div class="col-lg-6 border-bottom">
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
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Сайт">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="О компании" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <span class="text-danger">*</span> - обязательно для заполнения
                    </div>
                    <div class="col-lg-6">
                        <button type="button" name="button" class="btn btn-outline-success btn-block">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Почему сотрудничать с нами выгодно?
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="text-center">
                            Стабильные выплаты
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="text-center">
                            Официальное оформление по трудовому договору
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="text-center">
                            Более 7000 подключенных домов
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="text-center">
                            Положительная репутация
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="text-center">
                            15 лет на рынке
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="text-center">
                            Прозрачная статистика
                        </div>
                    </div>
                </div>
                <p>
                    <a href="#">Скачай презентацию</a> и узнай больше о преимуществах сотрудничества.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
