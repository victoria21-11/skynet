<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Section,
    Component,
    Layout
};
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
        $components = Component::with('params')->get();
        return view('admin.sections.create', [
            'title' => trans('admin.sections.create'),
            'components' => $components
        ]);
    }

    public function store(Store $request, Section $section)
    {
        $section = Section::create($request->validated());
        $section->update([
            'components' => json_encode(request()->get('components', []))
        ]);
        $section->syncMedia(['tree_icon']);
        return response([]);
    }

    public function edit(Section $section)
    {
        $components = Component::with('params')->get();
        $layouts = Layout::get()->toArray();
        $selectedLayout = [];
        foreach ($layouts as $key => $value) {
            $layouts[$key]['content'] = File::get(resource_path("layouts/{$value['layout_filename']}"));
            if($value['id'] == $section->layout_id) {
                $layouts[$key]['components'] = json_decode($section->components, true);
                $selectedLayout = $layouts[$key];
            }
        }
        return view('admin.sections.edit', [
            'title' => "Редактировать $section->title",
            'data' => $section,
            'media' => $section->prepareMedia(['tree_icon']),
            'components' => $components,
            'layouts' => $layouts,
            'selectedLayout' => $selectedLayout,
        ]);
    }

    public function update(Update $request, Section $section)
    {
        $section->update($request->validated());
        $section->update([
            'components' => json_encode(request()->get('components', []))
        ]);
        $section->syncMedia(['tree_icon']);
        return response([]);
    }

    public function destroy(Delete $request, Section $section)
    {
        $section->delete();
        return response([]);
    }
}
