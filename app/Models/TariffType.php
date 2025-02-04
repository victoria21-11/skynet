<?php

namespace App\Models;

class TariffType extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
    ];

    static function getOptions() {
        return self::all()->map(function ($value) {
            return [
                'value' => $value->id,
                'label' => $value->title
            ];
        })->toArray();
    }

    public function scopeInternet($query)
    {
        return $query->ofTitle('Internet');
    }

    public function scopeTv($query)
    {
        return $query->ofTitle('TV');
    }

}
