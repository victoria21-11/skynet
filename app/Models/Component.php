<?php

namespace App\Models;

class Component extends Model
{

    protected $table = 'components';

    protected $fillable = [
        'name',
        'title',
        'description',
        'path',
    ];

    protected $scopes = [
        'name' => 'ofLike',
        'title' => 'ofLike',
        'path' => 'ofLike',

    ];

    public function params() {
        return $this->hasMany(ComponentParam::class);
    }

}
