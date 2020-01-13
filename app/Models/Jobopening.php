<?php

namespace App\Models;

class Jobopening extends Model
{

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
    ];

}
