<?php

namespace App\Models;




class Question extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeGeneral($query)
    {
        return $query->where('general', true);
    }
}
