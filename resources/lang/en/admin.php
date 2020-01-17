<?php

return [

    'save' => 'Сохранить',
    'clear' => 'Очистить',
    'search' => 'Искать',
    'create' => 'Создать',
    'yes' => 'Да',
    'no' => 'Нет',
    'no_matter' => 'Не важно',
    'programmer_help' => 'Для изменения данного параметра обратитесь к техническому специалисту.',
    'tariffs' => [
        'title' => 'Тарифы',
        'create' => 'Новый тариф',
        'columns' => [
            'title' => 'Название',
            'bill_tariff_id' => 'ID в биллинге',
            'id' => 'ID',
            'tariff_type_id' => 'Тип',
            'tariff_group_id' => 'Группа',
            'period' => 'Период действия',
            'period_type_id' => 'Тип периода',
            'price' => 'Стоимость',
            'rebate' => 'Акция',
            'published' => 'Опубликовано',
            'description' => 'Описание',
        ]
    ],
    'tariff_groups' => [
        'title' => 'Группы тарифов',
        'create' => 'Новая группа',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'tariff_type_id' => 'Тип',
            'rebate' => 'Акция',
            'published' => 'Опубликовано',
            'description' => 'Описание',
        ]
    ],
    'tariff_types' => [
        'title' => 'Типы тарифов',
        'create' => 'Новый тип',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
        ]
    ],
    'streets' => [
        'title' => 'Улицы',
        'create' => 'Новая улица',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
        ]
    ],
    'houses' => [
        'title' => 'Дома',
        'create' => 'Новый дом',
        'columns' => [
            'title' => 'Номер дома',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'street_id' => 'Улица',
        ]
    ],
    'questions' => [
        'title' => 'FAQ',
        'create' => 'Новый вопрос',
        'columns' => [
            'title' => 'Вопрос',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'general' => 'Общий',
            'description' => 'Ответ',
            'question_type_id' => 'Тип',
        ]
    ],
    'question_types' => [
        'title' => 'Типы вопросов',
        'create' => 'Новый тип',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
        ]
    ],
    'jobopenings' => [
        'title' => 'Вакансии',
        'create' => 'Новая вакансия',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'requirements' => 'Требования',
            'responsibilities' => 'Обязанности',
            'extra' => 'Дополнительно',
            'conditions' => 'Условия',
        ]
    ],
    'equipments' => [
        'title' => 'Оборудование',
        'create' => 'Новое оборудование',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'extra' => 'Дополнительно',
            'installment' => 'В рассрочку',
            'installment_period' => 'Период рассрочки',
            'price' => 'Стоимость',
        ]
    ],
    'antiviruses' => [
        'title' => 'Антивирусная защита',
        'create' => 'Новый антивирус',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'extra' => 'Дополнительно',
            'antivirus_type_id' => 'Тип',
        ]
    ],
    'antivirus_periods' => [
        'title' => 'Антивирусная защита (периоды действия)',
        'create' => 'Новый период',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'period' => 'Период',
            'period_type_id' => 'Тип периода',
            'price' => 'Стоимость',
            'antivirus_id' => 'Антивирус',
        ]
    ],
    'antivirus_types' => [
        'title' => 'Антивирусная защита (тип)',
        'create' => 'Новый тип',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'preview_description' => 'Краткое описание',
            'description' => 'Описание',
        ]
    ],
    'news' => [
        'title' => 'Новости',
        'create' => 'Новая тема',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'created_at' => 'Дата',
        ]
    ],
    'telephones' => [
        'title' => 'Телефония',
        'create' => 'Новый тариф',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'created_at' => 'Дата',
            'price' => 'Стоимость',
            'price_urban' => 'Звонки на городские номера',
            'price_mobile' => 'Звонки на мобильные номера',
            'price_landline' => 'Городской номер',
            'min_per_month' => 'Пакет минут',
        ]
    ],
    'services' => [
        'title' => 'Сервисы',
        'create' => 'Новый сервис',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'url' => 'Ссылка',
            'preview_description' => 'Краткое описание',
        ]
    ],
    'period_types' => [
        'title' => 'Типы периодов',
        'create' => 'Новый тип',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
        ]
    ],
    'posts' => [
        'title' => 'Посты',
        'create' => 'Новый пост',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'navigation_id' => 'Категория',
            'created_at' => 'Дата',
            'published' => 'Опубликовано',
        ]
    ],
    'payment_methods' => [
        'title' => 'Способы оплаты',
        'create' => 'Новый способ оплаты',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'link' => 'Ссылка',
            'alternative' => 'Другой',
            'description' => 'Описание',
            'published' => 'Опубликовано',
        ]
    ],
    'packages' => [
        'title' => 'Пакеты',
        'create' => 'Новый пакет',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'name' => 'Имя',
            'hd_channels_count' => 'Кол-во HD каналов',
            'channels_count' => 'Кол-во каналов',
            'price' => 'Стоимость',
            'extra' => 'Дополнительный',
            'description' => 'Описание',
            'published' => 'Опубликовано',
        ]
    ],
    'global_settings' => [
        'title' => 'Глобальные настройки',
        'create' => 'Новая настройка',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'published' => 'Опубликовано',
            'value' => 'Значение',
        ]
    ],
    'slides' => [
        'title' => 'Баннер',
        'create' => 'Новый слайд',
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'description' => 'Описание',
            'published' => 'Опубликовано',
            'link_title' => 'Название ссылки',
            'link' => 'Ссылка',
            'order' => 'Порядок',
        ]
    ],

];
