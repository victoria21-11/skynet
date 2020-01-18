<?php

namespace App\Models;

use App\Traits\LikeTrait;

class News extends Model
{

    use LikeTrait;
    
    protected $appends = ['is_my_like_exists'];

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'created_at' => 'ofCreatedAt',
    ];

}
