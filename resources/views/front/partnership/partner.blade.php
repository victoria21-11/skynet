@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Стать Партнером
            </div>
            <div class="card-body">
                <p>
                    В предложенной ниже форме заявки кратко изложите необходимую информацию: конкретное наименование продуктов/услуг и свои контактные данные. Если предложение нас заинтересует, мы свяжемся с вами.
                </p>
                <div class="row">
                    <div class="col-lg-6 border-bottom">
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
                            <textarea placeholder="Сообщение" class="form-control"></textarea>
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
                Стать Партнером
            </div>
            <div class="card-body">
                <p>
                    SkyNet открыт для взаимодействия с поставщиками оборудования и услуг. Сотрудничество с нашей компанией обеспечит вам регулярные объемы заказов. При этом мы предъявляем самые высокие требования к нашим партнерам. Если ваша компания является гарантом качества, четкого сервиса и представляет конкурентное предложение - мы открыты к взаимовыгодному партнерству!
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
