<?php

namespace App\Models;

class News extends Model
{

    protected $appends = ['is_my_like_exists'];

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'created_at' => 'ofCreatedAt',
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

}
