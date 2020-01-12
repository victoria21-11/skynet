<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Jobopening extends Model
{

    protected $fillable = [
        'published',
        'title',
        'description',
    ];

}
