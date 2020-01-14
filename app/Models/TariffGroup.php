<?php

namespace App\Models;

class TariffGroup extends Model
{

    protected $appends = ['is_my_like_exists'];

    protected $scopes = [
        'title' => 'ofLike',
        'tariff_type_id' => 'ofType',
        'rebate' => 'ofStrict',
        'published' => 'ofStrict',
    ];

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

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

}
