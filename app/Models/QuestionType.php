<?php

namespace App\Models;

class QuestionType extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
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
