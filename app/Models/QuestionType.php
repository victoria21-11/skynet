<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
