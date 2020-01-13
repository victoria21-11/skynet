<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
        'period',
        'period_type_id',
        'bill_tariff_id',
        'tariff_group_id',
        'price',
        'rebate',
    ];

    protected $scopes = [
        'title' => 'ofTitle',
        'tariff_type_id' => 'ofType',
        'tariff_group_id' => 'ofGroup',
        'period' => 'ofPeriod',
        'period_type_id' => 'ofPeriodType',
        'price' => 'ofPrice',
        'bill_tariff_id' => 'ofBillTariff',
        'rebate' => 'ofRebate',
        'published' => 'ofPublished',
    ];

    public function group()
    {
        return $this->belongsTo(TariffGroup::class, 'tariff_group_id', 'id');
    }

    public function periodType()
    {
        return $this->belongsTo(PeriodType::class);
    }

    public function scopeOfTitle($query, $title)
    {
        return $query->where('title', 'like', "%$title%");
    }

    public function scopeOfType($query, $type)
    {
        return $query->whereHas('group', function($subQuery) use($type) {
            $subQuery->ofType(TariffType::findOrFail($type));
        });
    }

    public function scopeOfGroup($query, $group)
    {
        return $query->where('tariff_group_id', $group);
    }

    public function scopeOfPeriod($query, $period)
    {
        return $query->where('period', $period);
    }

    public function scopeOfPeriodType($query, $periodType)
    {
        return $query->where('period_type_id', $periodType);
    }

    public function scopeOfPrice($query, $price)
    {
        return $query->where('price', $price);
    }

    public function scopeOfBillTariff($query, $billTariff)
    {
        return $query->where('bill_tariff_id', $billTariff);
    }

    public function scopeOfRebate($query, $rebate)
    {
        return $query->where('rebate', $rebate);
    }

    public function scopeOfPublished($query, $published)
    {
        return $query->where('published', $published);
    }

    public function scopeOfFilters($query, array $filters)
    {
        foreach ($filters as $key => $value) {
            if(isset($this->scopes[$key])) {
                $query->{$this->scopes[$key]}($value);
            }
        }
        return $query;
    }

}
