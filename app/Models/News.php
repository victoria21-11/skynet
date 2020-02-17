<?php

namespace App\Models;

use App\Traits\LikeTrait;

class News extends Model
{

    use LikeTrait;

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'created_at' => 'ofDate',
    ];

}
