<?php

return [

    'save' => 'Сохранить',
    'clear' => 'Очистить',
    'search' => 'Искать',
    'create' => 'Создать',
    'programmer_help' => 'Для изменения данного параметра обратитесь к техническому специалисту.',
    'tariffs' => [
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
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
        ]
    ],
    'streets' => [
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
        ]
    ],
    'houses' => [
        'columns' => [
            'title' => 'Номер дома',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'street_id' => 'Улица',
        ]
    ],
    'questions' => [
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
        'columns' => [
            'title' => 'Название',
            'id' => 'ID',
            'published' => 'Опубликовано',
            'description' => 'Описание',
        ]
    ],
    'jobopenings' => [
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

];
