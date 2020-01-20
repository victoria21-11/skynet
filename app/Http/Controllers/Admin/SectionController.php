<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Http\Requests\Admin\Section\{
    Store,
    Update,
    Index,
    Delete
};

class SectionController extends Controller
{
    public function getTitle()
    {
        return trans('admin.sections.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Section::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.sections.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.sections.create', [
            'title' => trans('admin.sections.create'),
        ]);
    }

    public function store(Store $request, Section $section)
    {
        $section = Section::create($request->validated());
        $section->syncMedia(['tree_icon']);
        return response([]);
    }

    public function edit(Section $section)
    {
        return view('admin.sections.edit', [
            'title' => "Редактировать $section->title",
            'data' => $section,
            'media' => $section->prepareMedia(['tree_icon'])
        ]);
    }

    public function update(Update $request, Section $section)
    {
        $section->update($request->validated());
        $section->syncMedia(['tree_icon']);
        return response([]);
    }

    public function destroy(Delete $request, Section $section)
    {
        $section->delete();
        return response([]);
    }
}
