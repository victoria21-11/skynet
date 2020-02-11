<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use App\Http\Requests\Admin\SuccessStory\{
    Store,
    Update,
    Index,
    Delete
};

class SuccessStoryController extends Controller
{

    public function getTitle()
    {
        return trans('admin.success_stories.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = SuccessStory::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.success_stories.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.success_stories.create', [
            'title' => trans('admin.success_stories.create'),
        ]);
    }

    public function store(Store $request, SuccessStory $successStory)
    {
        $successStory = SuccessStory::create($request->validated());
        $successStory->syncMedia(['preview']);
        return response([]);
    }

    public function edit(SuccessStory $successStory)
    {
        return view('admin.success_stories.edit', [
            'title' => "Редактировать $successStory->title",
            'data' => $successStory,
            'media' => $successStory->prepareMedia(['preview'])
        ]);
    }

    public function update(Update $request, SuccessStory $successStory)
    {
        $successStory->update($request->validated());
        $successStory->syncMedia(['preview']);
        return response([]);
    }

    public function destroy(Delete $request, SuccessStory $successStory)
    {
        $successStory->delete();
        return response([]);
    }

}
