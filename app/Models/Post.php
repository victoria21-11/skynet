<?php

namespace App\Models;

class Post extends Model
{

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
        'created_at' => 'ofCreatedAt',
        'navigation_id' => 'ofNavigation',
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

    public function scopeOfNavigation($query, $navigation)
    {
        return $query->where('navigation_id', $navigation);
    }
}
