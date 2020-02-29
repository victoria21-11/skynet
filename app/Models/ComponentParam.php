<?php

namespace App\Models;

class ComponentParam extends Model
{

    protected $table = 'component_params';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'title',
        'component_id',
        'multiple',
        'required',
    ];

    protected $scopes = [
    ];

}
