<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TariffType extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    static function getOptions() {
        return self::all()->map(function ($value) {
            return [
                'value' => $value->id,
                'label' => $value->title
            ];
        })->toArray();
    }

    public function scopeOfTitle($query, string $title)
    {
        return $this->where('title', $title);
    }

    public function scopeInternet($query)
    {
        return $this->ofTitle('Internet');
    }

    public function scopeTv($query)
    {
        return $this->ofTitle('TV');
    }

}
