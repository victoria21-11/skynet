<?php

namespace App\Models;

class Telephone extends Model
{

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
        'price' => 'ofPrice',
        'price_urban' => 'ofPriceUrban',
        'price_mobile' => 'ofPriceMobile',
        'price_landline' => 'ofPriceLandline',
        'min_per_month' => 'ofMinPerMonth',
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

    public function scopeOfPrice($query, $price) {
        return $query->where('price', $price);
    }

    public function scopeOfPriceUrban($query, $priceUrban) {
        return $query->where('price_urban', $priceUrban);
    }

    public function scopeOfPriceMobile($query, $priceMobile) {
        return $query->where('price_mobile', $priceMobile);
    }

    public function scopeOfPriceLandline($query, $priceLandline) {
        return $query->where('price_landline', $priceLandline);
    }

    public function scopeOfMinPerMonth($query, $minPerMonth) {
        return $query->where('min_per_month', $minPerMonth);
    }
}
