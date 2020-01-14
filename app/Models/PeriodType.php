<?php

namespace App\Models;

class PeriodType extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'name' => 'ofName',
    ];

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
