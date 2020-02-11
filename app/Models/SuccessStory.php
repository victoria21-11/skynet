<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class SuccessStory extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'description',
        'published',
        'name',
        'start_position',
        'surrent_position',
        'experience_years',
    ];

    protected $scopes = [
        'published' => 'ofBoolean',
        'name' => 'ofLike',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('employee')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/svg']);
    }
}
