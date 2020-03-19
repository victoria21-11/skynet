<?php

namespace App\Models;

class Tariff extends Model
{

    static $syncFields = [
        'title' => 'title',
        'price_month' => 'price',
        'bl_s1_connection' => 'bill_tariff_id',
    ];

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

    static $bindBillField = 'bl_s1_connection';

    public static function getSyncBillFields()
    {
        return array_keys(self::$syncFields);
    }

    public static function getSyncLocalFields()
    {
        return array_values(self::$syncFields);
    }

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
