<?php

namespace App\Models;

class Question extends Model
{

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeGeneral($query)
    {
        return $query->where('general', true);
    }
}
