<?php

namespace App\Models;

class Jobopening extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofStrict',
    ];

}
