<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Street extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    public function scopeOfTitle($query, $title)
    {
        return $query->where('title', 'like', $title . '%');
    }
}
