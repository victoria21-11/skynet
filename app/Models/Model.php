<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as DefaultModel;

class Model extends DefaultModel
{

    protected $scopes = [

    ];

    public function scopeOfTitle($query, $title)
    {
        return $query->where('title', 'like', "%$title%");
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
