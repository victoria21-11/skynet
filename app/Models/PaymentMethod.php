<?php

namespace App\Models;

class PaymentMethod extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofStrict',
        'alternative' => 'ofAlternative',
        'link' => 'ofStrict',
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

}
