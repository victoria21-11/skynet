<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\LikeTrait;

class TariffGroup extends Model implements HasMedia
{

    use LikeTrait, HasMediaTrait;

    protected $scopes = [
        'title' => 'ofLike',
        'tariff_type_id' => 'ofStrict',
        'rebate' => 'ofStrict',
        'published' => 'ofBoolean',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('icon')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/svg']);
    }

    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }

    public function type()
    {
        return $this->belongsTo(TariffType::class, 'tariff_type_id', 'id');
    }

    static function getOptions()
    {
        return self::all()->map(function ($value) {
            return [
                'value' => $value->id,
                'label' => $value->title
            ];
        })->toArray();
    }

    public function getMaxPeriodTariffAttribute()
    {
        return $this->tariffs()->with('group', 'periodType')->orderBy('period')->first();
    }

    public function scopeOfType($query, TariffType $type)
    {
        return $query->where('tariff_type_id', $type->id);
    }

    public function scopeInternet($query)
    {
        return $query->ofType(TariffType::internet()->first());
    }

    public function scopeTv($query)
    {
        return $query->ofType(TariffType::tv()->first());
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

}
