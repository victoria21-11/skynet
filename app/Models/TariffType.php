<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function scopeOfTitle($query, string $title)
    {
        return $query->where('title', $title);
    }

    public function scopeInternet($query)
    {
        return $query->ofTitle('Internet');
    }

    public function scopeTv($query)
    {
        return $query->ofTitle('TV');
    }

    public function scopeOfFilters($query, array $filters)
    {
        foreach ($filters as $key => $value) {
            if(isset($this->scopes[$key])) {
                $query->{$this->scopes[$key]}($value);
            }
        }
        return $query;
    }

}
