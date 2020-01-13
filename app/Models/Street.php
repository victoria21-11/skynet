<?php

namespace App\Models;

class Street extends Model
{

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
    ];

    public function houses()
    {
        return $this->hasMany(House::class);
    }

}
