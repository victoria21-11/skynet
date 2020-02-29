<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\LikeTrait;

class Section extends Model implements HasMedia
{

    use LikeTrait, HasMediaTrait;

    protected $fillable = [
        'title',
        'url',
        'description',
        'view',
        'published',
    ];

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

    public function components() {
        return $this->belongsToMany(Component::class)->withPivot('params')->orderBy('order');
    }

    public function getFrontComponentsAttribute()
    {
        return $this->components
            ->map(function($item) {
                $item->params = json_decode($item->pivot->params, true);
                $item->params = collect($item->params)->keyBy('name')
                    ->map(function($param) {
                        return $param['value'];
                    })->toArray();
                return $item;
            });
    }

}
