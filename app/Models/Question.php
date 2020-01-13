<?php

namespace App\Models;

class Question extends Model
{

    protected $scopes = [
        'title' => 'ofTitle',
        'published' => 'ofPublished',
        'general' => 'ofGeneral',
        'question_type_id' => 'ofQuestionType',
    ];

    public function type()
    {
        return $this->belongsTo(QuestionType::class, 'question_type_id', 'id');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeOfGeneral($query, $general)
    {
        return $query->where('general', $general);
    }

    public function scopeOfQuestionType($query, $questionType)
    {
        return $query->where('question_type_id', $questionType);
    }

    public function scopeGeneral($query)
    {
        return $query->where('general', true);
    }
}
