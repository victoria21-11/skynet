<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as DefaultModel;
use Carbon\Carbon;
use App\Traits\MediaTrait;

class Model extends DefaultModel
{

    use MediaTrait;

    protected $guarded = [
        'id',
    ];

    protected $scopes = [

    ];

    protected $casts = [
        'published' => 'integer'
    ];

    public function scopeOfStrict($query, $value, $key)
    {
        return $query->where($key, $value);
    }

    public function scopeOfBoolean($query, $value, $key)
    {
        if(is_null($value)) {
            return $query;
        }
        return $query->where($key, $value);
    }

    public function scopeOfLike($query, $value, $key)
    {
        return $query->where($key, 'like', "%$value%");
    }

    public function scopeOfTitle($query, $title)
    {
        return $query->ofStrict($title, 'title');
    }

    public function scopeOfFilters($query, array $filters)
    {
        foreach ($filters as $key => $value) {
            if(isset($this->scopes[$key])) {
                $query->{$this->scopes[$key]}($value, $key);
            }
        }
        return $query;
    }

    public function scopeOfDate($query, $date)
    {
        $dates = explode('to', $date);
        if(count($dates) == 2) {
            return $query->whereDate('created_at', '>=', Carbon::parse($dates[0]))
            ->whereDate('created_at', '<=', Carbon::parse($dates[1]));
        } else {
            return $query->whereDate('created_at', Carbon::parse($date));
        }
        return $query;
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

}
