<?php

namespace App\Models;



class TariffGroup extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
        'tariff_type_id',
        'rebate',
    ];

    protected $appends = ['is_my_like_exists'];

    protected $scopes = [
        'title' => 'ofTitle',
        'tariff_type_id' => 'ofType',
        'rebate' => 'ofRebate',
        'published' => 'ofPublished',
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

    public function scopeOfType($query, $type)
    {
        return $query->where('tariff_type_id', $type);
    }

    public function scopeInternet($query)
    {
        return $query->ofType(TariffType::internet()->first()->id);
    }

    public function scopeTv($query)
    {
        return $query->ofType(TariffType::tv()->first()->id);
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

    public function scopeOfPublished($query, $published)
    {
        return $query->where('published', $published);
    }

    public function scopeOfRebate($query, $rebate)
    {
        return $query->where('rebate', $rebate);
    }

}
