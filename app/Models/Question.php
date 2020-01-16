<?php

namespace App\Models;

class Question extends Model
{

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'general' => 'ofGeneral',
        'question_type_id' => 'ofStrict',
    ];

    public function type()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id', 'id');
    }

    public function scopeGeneral($query)
    {
        return $query->where('general', true);
    }
}
