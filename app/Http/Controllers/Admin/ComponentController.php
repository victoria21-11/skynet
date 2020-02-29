<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Component,
    ComponentParam
};
use App\Http\Requests\Admin\Component\{
    Store,
    Update,
    Index,
    Delete
};

class ComponentController extends Controller
{

    public function getTitle()
    {
        return trans('admin.components.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Component::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.components.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.components.create', [
            'title' => trans('admin.components.create'),
        ]);
    }

    public function store(Store $request, Component $component)
    {
        $component = Component::create($request->validated());
        $component->params()->createMany($request->get('params', []));
        return response([]);
    }

    public function edit(Component $component)
    {
        return view('admin.components.edit', [
            'title' => "Редактировать $component->title",
            'data' => $component->load('params'),
        ]);
    }

    public function update(Update $request, Component $component)
    {
        $component->update($request->validated());
        $component->params()->delete();
        $component->params()->createMany($request->get('params', []));
        return response([]);
    }

    public function destroy(Delete $request, Component $component)
    {
        $component->delete();
        return response([]);
    }
}
