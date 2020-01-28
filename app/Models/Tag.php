<?php

namespace App\Models;

class Tag extends Model
{
    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
    ];
}
