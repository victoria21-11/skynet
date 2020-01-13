<?php

namespace App\Models;



class TariffType extends Model
{


    protected $fillable = [
        'title',
        'description',
    ];

    protected $scopes = [
        'title' => 'ofTitle',
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
