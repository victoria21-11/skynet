<?php

namespace App\Models;

use App\Traits\LikeTrait;

class Equipment extends Model
{

    use LikeTrait;

    protected $table = 'equipments';

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'installment' => 'ofStrict',
        'installment_period' => 'ofStrict',
        'price' => 'ofStrict',
    ];

    public function getUrl()
    {
        return url('/home/internet/equipments/' . $this->id);
    }

    public function getInstallmentPrice()
    {
        return intval($this->price / $this->installment_period);
    }

}
