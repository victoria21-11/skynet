<?php

namespace App\Models;

class Layout extends Model
{

    protected $table = 'layouts';

    protected $fillable = [
        'name',
        'title',
        'layout_filename',

    ];

    protected $scopes = [
        'name' => 'ofLike',
        'title' => 'ofLike',
        'layout_filename' => 'ofLike',

    ];

}
