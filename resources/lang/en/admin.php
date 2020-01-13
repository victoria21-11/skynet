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

];
