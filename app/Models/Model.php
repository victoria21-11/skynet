<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as DefaultModel;
use Carbon\Carbon;
use Spatie\MediaLibrary\Models\Media;

class Model extends DefaultModel
{

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

    public function scopeOfCreatedAt($query, $date)
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

    public function syncMedia(array $collections) {
        foreach ($collections as $collection) {
            foreach (request()->input($collection . '.added', []) as $value) {
                $this->addMedia(storage_path('app/' . $value))->toMediaCollection($collection);
            }
            foreach (request()->input($collection . '.removed', []) as $value) {
                Media::findOrFail($value)->delete();
            }
        }
    }

    public function prepareMedia(array $collections)
    {
        $result = [];
        foreach ($collections as $collection) {
            $result[$collection] = $this->getMedia($collection)
                ->map(function ($item) {
                    $item->full_url = $item->getFullUrl();
                    return $item;
                });
        }
        return $result;
    }

}
