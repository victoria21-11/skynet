<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AntivirusType extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
    ];

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
