<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Slide extends Model implements HasMedia
{

    use HasMediaTrait;

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'link' => 'ofLike',
        'link_title' => 'ofLike',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/svg']);
    }

}
