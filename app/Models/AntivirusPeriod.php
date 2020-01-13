<?php

namespace App\Models;

class AntivirusPeriod extends Model
{

    protected $scopes = [
        'published' => 'ofPublished',
        'price' => 'ofPrice',
        'period' => 'ofPeriod',
        'period_type_id' => 'ofPeriodType',
        'antivirus_id' => 'ofAntivirus',
    ];

    public function periodType()
    {
        return $this->belongsTo(PeriodType::class);
    }

    public function antivirus()
    {
        return $this->belongsTo(Antivirus::class);
    }

    public function scopeOfPrice($query, $price)
    {
        return $query->where('price', $price);
    }

    public function scopeOfPeriod($query, $period)
    {
        return $query->where('period', $period);
    }

    public function scopeOfPeriodType($query, $periodType)
    {
        return $query->where('period_type_id', $periodType);
    }

    public function scopeOfAntivirus($query, $antivirus)
    {
        return $query->where('antivirus_id', $antivirus);
    }
}
