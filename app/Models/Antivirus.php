<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\LikeTrait;

class Antivirus extends Model implements HasMedia
{

    use HasMediaTrait, LikeTrait;

    protected $table = 'antiviruses';

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'antivirus_type_id' => 'ofStrict',
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

    public function periods()
    {
        return $this->hasMany(AntivirusPeriod::class);
    }

    public function type()
    {
        return $this->belongsTo(AntivirusType::class, 'antivirus_type_id', 'id');
    }

    public function getMinPrice()
    {
        return $this->periods()->orderBy('price', 'ASC')->first()->price;
    }
}
