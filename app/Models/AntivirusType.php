<?php

namespace App\Models;

class AntivirusType extends Model
{

    public function antiviruses()
    {
        return $this->hasMany(Antivirus::class);
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

    public function getUrl()
    {
        return url('/home/internet/antiviruses/' . $this->id);
    }

    public function getMinPrice()
    {
        return $this->antiviruses->map(function($antivirus) {
            return $antivirus->getMinPrice();
        })->sort()->first();
    }
}
