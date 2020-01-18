<?php

namespace App\Models;

class PaymentMethod extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'alternative' => 'ofAlternative',
        'link' => 'ofStrict',
    ];

    public function scopeAlternative($query)
    {
        return $query->ofAlternative(true);
    }

    public function scopeOfAlternative($query, $alternative)
    {
        return $query->where('alternative', $alternative);
    }

    public function scopeNotAlternative($query)
    {
        return $query->ofAlternative(false);
    }


}
