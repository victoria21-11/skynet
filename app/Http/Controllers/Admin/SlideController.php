<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Http\Requests\Admin\Slide\{
    Store,
    Update,
    Index,
    Delete
};

class SlideController extends Controller
{

    public function getTitle()
    {
        return trans('admin.slides.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Slide::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.slides.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.slides.create', [
            'title' => trans('admin.slides.create'),
        ]);
    }

    public function store(Store $request, Slide $slide)
    {
        $slide = Slide::create($request->validated());
        $slide->syncMedia(['image']);
        return response([]);
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', [
            'title' => "Редактировать $slide->title",
            'data' => $slide,
            'media' => $slide->prepareMedia(['image'])
        ]);
    }

    public function update(Update $request, Slide $slide)
    {
        $slide->update($request->validated());
        $slide->syncMedia(['image']);
        return response([]);
    }

    public function destroy(Delete $request, Slide $slide)
    {
        $slide->delete();
        return response([]);
    }
}
