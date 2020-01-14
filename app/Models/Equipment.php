<?php

namespace App\Models;

class Equipment extends Model
{

    protected $table = 'equipments';

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofStrict',
        'installment' => 'ofStrict',
        'installment_period' => 'ofStrict',
        'price' => 'ofStrict',
    ];

    public function getClassName()
    {
        return quotemeta(self::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getIsMyLikeExistsAttribute()
    {
        return Like::isExists(request()->ip(), $this->id, self::class);
    }

    public function getUrl()
    {
        return url('/home/internet/equipments/' . $this->id);
    }

    public function getInstallmentPrice()
    {
        return intval($this->price / $this->installment_period);
    }
    
}
