<?php

namespace App\Models;

use App\Traits\LikeTrait;

class Post extends Model
{

    use LikeTrait;
    
    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'created_at' => 'ofDate',
    ];

    public function navigation()
    {
        return $this->belongsTo(Navigation::class);
    }

}
