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
                        <button type="button" class="btn btn-outline-success btn-block">Отправить</button>
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
