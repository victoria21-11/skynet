<?php

namespace App\Models;




class Telephone extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
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
