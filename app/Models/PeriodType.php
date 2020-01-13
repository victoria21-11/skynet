<?php

namespace App\Models;

class PeriodType extends Model
{

    static function getOptions() {
        return self::all()->map(function ($value) {
            return [
                'value' => $value->id,
                'label' => $value->title
            ];
        })->toArray();
    }

    public function scopeOfName($query, $name)
    {
        $query->where('name', $name);
    }
}
