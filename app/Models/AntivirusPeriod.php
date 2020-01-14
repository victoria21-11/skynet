<?php

namespace App\Models;

class AntivirusPeriod extends Model
{

    protected $scopes = [
        'published' => 'ofStrict',
        'price' => 'ofStrict',
        'period' => 'ofStrict',
        'period_type_id' => 'ofStrict',
        'antivirus_id' => 'ofStrict',
    ];

    public function periodType()
    {
        return $this->belongsTo(PeriodType::class);
    }

    public function antivirus()
    {
        return $this->belongsTo(Antivirus::class);
    }

}
