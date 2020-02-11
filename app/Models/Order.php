<?php

namespace App\Models;

class Order extends Model
{

    protected $table = 'orders';

    protected $fillable = [
        'id',
'title',
'description',
'phone',
'street',
'house',
'tariff_id',
'house_id',
'created_at',
'updated_at',

    ];

    protected $scopes = [
        'id' => 'ofStrict',
'title' => 'ofLike',
'description' => 'ofLike',
'phone' => 'ofLike',
'street' => 'ofLike',
'house' => 'ofLike',
'tariff_id' => 'ofLike',
'house_id' => 'ofLike',
'created_at' => 'ofDate',
'updated_at' => 'ofDate',

    ];

}
