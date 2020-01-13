<?php

namespace App\Models;

class NavigationType extends Model
{

    public function scopeHeader($query)
    {
        return $query->where('title', 'header');
    }

    public function scopeFooter($query)
    {
        return $query->where('title', 'footer');
    }

    public function navigations()
    {
        return $this->belongsToMany(Navigation::class);
    }
}
