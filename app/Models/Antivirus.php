<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Antivirus extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $table = 'antiviruses';

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofStrict',
        'antivirus_type_id' => 'ofStrict',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('preview')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg']);
    }

    public function periods()
    {
        return $this->hasMany(AntivirusPeriod::class);
    }

    public function type()
    {
        return $this->belongsTo(AntivirusType::class, 'antivirus_type_id', 'id');
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

    public function getMinPrice()
    {
        return $this->periods()->orderBy('price', 'ASC')->first()->price;
    }
}
