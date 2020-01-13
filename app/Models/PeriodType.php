<?php

namespace App\Models;




class PeriodType extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
        'name',
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
