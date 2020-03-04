<?php

namespace App\Models;

class Street extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
    ];

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    public function scopeOfTitle($query, $title)
    {
        return $query->where('title', 'like', "%$title%");
    }

}
