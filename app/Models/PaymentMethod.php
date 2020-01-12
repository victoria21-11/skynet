<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

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
