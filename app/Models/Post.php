<?php

namespace App\Models;

class Post extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'created_at' => 'ofCreatedAt',
        'navigation_id' => 'ofStrict',
    ];

    public function navigation()
    {
        return $this->belongsTo(Navigation::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getIsMyLikeExistsAttribute()
    {
        return Like::isExists(request()->ip(), $this->id, self::class);
    }

    public function getClassName()
    {
        return quotemeta(self::class);
    }

}
