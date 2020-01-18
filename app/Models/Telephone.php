<?php

namespace App\Models;

use App\Traits\LikeTrait;

class Telephone extends Model
{

    use LikeTrait;
    
    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'price' => 'ofStrict',
        'price_urban' => 'ofStrict',
        'price_mobile' => 'ofStrict',
        'price_landline' => 'ofStrict',
        'min_per_month' => 'ofStrict',
    ];

}
