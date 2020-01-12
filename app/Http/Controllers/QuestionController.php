<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Question,
    QuestionType
};

class QuestionController extends Controller
{
    public function index()
    {
        $types = QuestionType::with('questions')->get();
        return view('front.questions.index', [
            'types' => $types
        ]);
    }

    public function show(Question $question)
    {
        return view('front.questions.show', [
            'question' => $question
        ]);
    }
}
