<?php

namespace App\Models;

class Layout extends Model
{

    protected $table = 'layouts';

    protected $fillable = [
        'id',
'name',
'title',
'markup',
'created_at',
'updated_at',

    ];

    protected $scopes = [
        'id' => 'ofStrict',
'name' => 'ofLike',
'title' => 'ofLike',
'markup' => 'ofLike',
'created_at' => 'ofDate',
'updated_at' => 'ofDate',

    ];

}
