<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Http\Requests\Admin\Question\{
    Store,
    Update,
    Index,
    Delete
};

class QuestionController extends Controller
{
    protected $title = 'FAQ';

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Question::with('type')->ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.questions.index', [
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('admin.questions.create', [
            'title' => "Новый вопрос",
        ]);
    }

    public function store(Store $request, Question $question)
    {
        $question = Question::create($request->validated());
        return response([]);
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit', [
            'title' => "Редактировать $question->title",
            'data' => $question,
        ]);
    }

    public function update(Update $request, Question $question)
    {
        $question->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Question $question)
    {
        $question->delete();
        return response([]);
    }
}
