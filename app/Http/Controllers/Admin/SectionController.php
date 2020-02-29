<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Section,
    Component
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
        $this->syncParams($section);
        $section->syncMedia(['tree_icon']);
        return response([]);
    }

    public function edit(Section $section)
    {
        $components = Component::with('params')->get();
        $usedComponents = $section->components()
            ->get()
            ->map(function($item) {
                $item->params = json_decode($item->pivot->params, true);
                return $item;
            });
        return view('admin.sections.edit', [
            'title' => "Редактировать $section->title",
            'data' => $section->load('components'),
            'media' => $section->prepareMedia(['tree_icon']),
            'components' => $components,
            'usedComponents' => $usedComponents,
        ]);
    }

    public function update(Update $request, Section $section)
    {
        $section->update($request->validated());
        $this->syncParams($section);
        $section->syncMedia(['tree_icon']);
        return response([]);
    }

    private function syncParams(Section $section) {
        $components = [];
        foreach (request()->get('components', []) as $value) {
            $components[$value['id']] = [
                'params' => json_encode($value['params']),
            ];
        }
        $section->components()->sync($components);
    }

    public function destroy(Delete $request, Section $section)
    {
        $section->delete();
        return response([]);
    }
}
