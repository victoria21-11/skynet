<?php

namespace App\Models;




class Street extends Model
{
    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    protected $scopes = [
        'title' => 'ofTitle',
    ];

    public function houses()
    {
        return $this->hasMany(House::class);
    }

}
