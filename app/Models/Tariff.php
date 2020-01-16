<?php

namespace App\Models;

class Tariff extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'tariff_type_id' => 'ofType',
        'tariff_group_id' => 'ofStrict',
        'period' => 'ofStrict',
        'period_type_id' => 'ofStrict',
        'price' => 'ofStrict',
        'bill_tariff_id' => 'ofStrict',
        'rebate' => 'ofStrict',
        'published' => 'ofBoolean',
    ];

    public function group()
    {
        return $this->belongsTo(TariffGroup::class, 'tariff_group_id', 'id');
    }

    public function periodType()
    {
        return $this->belongsTo(PeriodType::class);
    }

    public function scopeOfType($query, $type)
    {
        return $query->whereHas('group', function($subQuery) use($type) {
            $subQuery->ofType(TariffType::findOrFail($type));
        });
    }

}
