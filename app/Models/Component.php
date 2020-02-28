<?php

namespace App\Models;

class Component extends Model
{

    protected $table = 'components';

    protected $fillable = [
        'id',
'name',
'title',
'description',
'path',
'created_at',
'updated_at',

    ];

    protected $scopes = [
        'id' => 'ofStrict',
'name' => 'ofLike',
'title' => 'ofLike',
'description' => 'ofLike',
'path' => 'ofLike',
'created_at' => 'ofDate',
'updated_at' => 'ofDate',

    ];

}
