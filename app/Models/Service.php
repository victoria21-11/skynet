<?php

namespace App\Models;

class Service extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'url' => 'ofLike',
    ];

    public function getClassName()
    {
        return quotemeta(self::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getIsMyLikeExistsAttribute()
    {
        return Like::isExists(request()->ip(), $this->id, self::class);
    }

    public function getUrl()
    {
        return url('/home/internet/services/' . $this->id);
    }

}
