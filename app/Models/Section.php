<?php

namespace App\Models;

use App\Traits\LikeTrait;

class Section extends Model
{

    use LikeTrait;

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'url' => 'ofLike',
        'view' => 'ofLike',
    ];

}
