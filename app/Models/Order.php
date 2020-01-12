<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
        'phone',
        'street',
        'house',
        'tariff_id',
        'house_id',
    ];

}
