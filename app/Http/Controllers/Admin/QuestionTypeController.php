<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionType;
use App\Http\Requests\Admin\QuestionType\{
    Store,
    Update,
    Index,
    Delete
};

class QuestionTypeController extends Controller
{
    public function getTitle()
    {
        return trans('admin.question_types.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = QuestionType::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));
        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.question_types.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.question_types.create', [
            'title' => trans('admin.question_types.create'),
        ]);
    }

    public function store(Store $request, QuestionType $questionType)
    {
        $questionType = QuestionType::create($request->validated());
        return response([]);
    }

    public function edit(QuestionType $questionType)
    {
        return view('admin.question_types.edit', [
            'title' => "Редактировать $questionType->title",
            'data' => $questionType,
        ]);
    }

    public function update(Update $request, QuestionType $questionType)
    {
        $questionType->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, QuestionType $questionType)
    {
        $questionType->delete();
        return response([]);
    }
}
