<?php

namespace App\Models;

use App\Traits\LikeTrait;

class Service extends Model
{

    use LikeTrait;
    
    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'url' => 'ofLike',
    ];

    public function getUrl()
    {
        return url('/home/internet/services/' . $this->id);
    }

}
