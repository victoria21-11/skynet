<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Question,
    QuestionType
};
use App\Http\Requests\Admin\Question\{
    Store,
    Update,
    Index,
    Delete
};

class QuestionController extends Controller
{
    public function getTitle()
    {
        return trans('admin.questions.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Question::with('type')->ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        $questionTypes = QuestionType::get()->toArray();

        return view('admin.questions.index', [
            'title' => $this->getTitle(),
            'questionTypes' => $questionTypes,
        ]);
    }

    public function create()
    {
        $questionTypes = QuestionType::get()->toArray();
        return view('admin.questions.create', [
            'title' => trans('admin.questions.create'),
            'questionTypes' => $questionTypes,
        ]);
    }

    public function store(Store $request, Question $question)
    {
        $question = Question::create($request->validated());
        return response([]);
    }

    public function edit(Question $question)
    {
        $questionTypes = QuestionType::get()->toArray();
        return view('admin.questions.edit', [
            'title' => "Редактировать $question->title",
            'data' => $question,
            'questionTypes' => $questionTypes,
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
