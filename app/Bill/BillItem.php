<?php

namespace App\Bill;

use App\Models\Tariff as TariffModel;

class BillItem
{

    public $syncFields = [
        'title',
        'price_month',
        'bl_s1_connection',
    ];

    public function __construct(array $data)
    {
        foreach ($this->syncFields as $value) {
            $this->{$value} = $data[$value] ?? null;
        }
    }

    public function mergeLocal(array $data)
    {

    }
}
