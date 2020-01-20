<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\LikeTrait;

class Section extends Model implements HasMedia
{

    use LikeTrait, HasMediaTrait;

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'url' => 'ofLike',
        'view' => 'ofLike',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('tree_icon')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/svg']);
    }

    public function trees()
    {
        return $this->hasMany(Tree::class);
    }

}
