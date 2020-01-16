<?php

namespace App\Models;

class House extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'street_id' => 'ofStrict',
    ];

    public function scopeOfStreet($query, $street)
    {
        return $query->where('street_id', $street);
    }

    public function street()
    {
        return $this->belongsTo(Street::class);
    }
}
