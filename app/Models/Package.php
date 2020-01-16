<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Package extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'name' => 'ofLike',
        'hd_channels_count' => 'ofStrict',
        'channels_count' => 'ofStrict',
        'price' => 'ofStrict',
        'extra' => 'ofStrict',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('preview')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/svg']);
    }

    public function registerMediaConversions(Media $media = null)
    {
       $this->addMediaConversion('thumb')
          ->sharpen(10);
    }
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
