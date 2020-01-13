<?php

namespace App\Models;

class House extends Model
{
    
    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
        'street_id' => 'ofStreet',
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
