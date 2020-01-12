<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function scopeOfTitle($query, $title)
    {
        return $query->where('title', 'like', $title . '%');
    }
}
