<?php

namespace App\Models;

class PaymentMethod extends Model
{

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
        'alternative' => 'ofAlternative',
        'link' => 'ofLink',
    ];

    public function scopeAlternative($query)
    {
        return $query->ofAlternvative(true);
    }

    public function scopeNotAlternative($query)
    {
        return $query->ofAlternvative(false);
    }

    public function scopeOfAlternative($query, $alternative)
    {
        return $query->where('alternative', $alternative);
    }

    public function scopeOfLink($query, $link)
    {
        return $query->where('link', $link);
    }
}
