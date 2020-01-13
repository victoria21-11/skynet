<?php

namespace App\Models;

class Equipment extends Model
{

    protected $table = 'equipments';

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
        'installment' => 'ofInstallment',
        'installment_period' => 'ofInstallmentPeriod',
        'price' => 'ofPrice',
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

    public function scopeOfPrice($query, $price)
    {
        return $query->where('price', $price);
    }

    public function scopeOfInstallment($query, $installment)
    {
        return $query->where('installment', $installment);
    }

    public function scopeOfInstallmentPeriod($query, $installmentPeriod)
    {
        return $query->where('installment_period', $installmentPeriod);
    }
}
