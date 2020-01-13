<?php

namespace App\Models;




class Package extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function scopeExtra($query)
    {
        return $query->where('extra', true);
    }

    public function scopeNotExtra($query)
    {
        return $query->where('extra', false);
    }

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

    public function tariffGroups()
    {
        return $this->belongsToMany(TariffGroup::class);
    }
}
