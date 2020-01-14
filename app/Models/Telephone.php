<?php

namespace App\Models;

class Telephone extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofStrict',
        'price' => 'ofStrict',
        'price_urban' => 'ofStrict',
        'price_mobile' => 'ofStrict',
        'price_landline' => 'ofStrict',
        'min_per_month' => 'ofStrict',
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
