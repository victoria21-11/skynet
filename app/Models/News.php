<?php

namespace App\Models;

use Carbon\Carbon;

class News extends Model
{

    protected $appends = ['is_my_like_exists'];

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
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

    public function scopeOfCreatedAt($query, $date)
    {
        $dates = explode('to', $date);
        if(count($dates) == 2) {
            return $query->whereDate('created_at', '>=', Carbon::parse($dates[0]))
            ->whereDate('created_at', '<=', Carbon::parse($dates[1]));
        }
        return $query;
    }
}
