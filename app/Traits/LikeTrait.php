<?php

namespace App\Traits;

use App\Models\Like;

trait LikeTrait
{
    public function getClassName()
    {
        return quotemeta(self::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function currentUserLikes()
    {
        return $this->likes()->currentIP();
    }

    public function getIsMyLikeExistsAttribute()
    {
        return Like::isExists(request()->ip(), $this->id, self::class);
    }
}
