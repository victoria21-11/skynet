<?php

namespace App\Models;

class Layout extends Model
{

    protected $table = 'layouts';

    protected $fillable = [
        'name',
        'title',
        'markup',

    ];

    protected $scopes = [
        'name' => 'ofLike',
        'title' => 'ofLike',

    ];

    protected $casts = [
        'markup' => 'array',
    ];

}
