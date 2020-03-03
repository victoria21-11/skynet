<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layout;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Layout\{
    Store,
    Update,
    Index,
    Delete
};

class LayoutController extends Controller
{

    public function getTitle()
    {
        return trans('admin.layouts.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Layout::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.layouts.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.layouts.create', [
            'title' => trans('admin.layouts.create'),
            'files' => $this->getFiles(),
        ]);
    }

    public function store(Store $request, Layout $layout)
    {
        $layout = Layout::create($request->validated());
        return response([]);
    }

    public function edit(Layout $layout)
    {

        return view('admin.layouts.edit', [
            'title' => "Редактировать $layout->title",
            'data' => $layout,
            'files' => $this->getFiles(),
        ]);
    }

    public function update(Update $request, Layout $layout)
    {
        $layout->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Layout $layout)
    {
        $layout->delete();
        return response([]);
    }

    private function getFiles()
    {
        $files = File::files(resource_path('layouts'));
        foreach ($files as $key => $file) {
            $files[$key] = pathinfo($file);
        }
        return $files;
    }
}
