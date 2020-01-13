<?php

namespace App\Models;




class PaymentMethod extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function scopeAlternative($query)
    {
        return $query->where('alternative', true);
    }

    public function scopeNotAlternative($query)
    {
        return $query->where('alternative', false);
    }
}
