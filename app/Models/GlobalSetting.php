<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class GlobalSetting extends Model implements HasMedia
{

    use HasMediaTrait;

    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/svg']);
    }

    protected $scopes = [
        'title' => 'ofLike',
        'value' => 'ofLike',
        'name' => 'ofLike',
        'published' => 'ofBoolean',
    ];

    public function scopeOfName($query, $name)
    {
        return $query->where('name', $name);
    }
}
