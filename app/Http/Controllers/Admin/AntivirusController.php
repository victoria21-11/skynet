<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Antivirus;
use App\Http\Traits\Media;
use App\Http\Requests\Admin\Antivirus\{
    Store,
    Update,
    Index,
    Delete
};

class AntivirusController extends Controller
{

    use Media;

    public function getTitle()
    {
        return trans('admin.antiviruses.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Antivirus::with('type')->ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.antiviruses.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.antiviruses.create', [
            'title' => trans('admin.antiviruses.create'),
        ]);
    }

    public function store(Store $request, Antivirus $antivirus)
    {
        $antivirus = Antivirus::create($request->validated());
        $this->syncMedia($antivirus, ['preview']);
        return response([]);
    }

    public function edit(Antivirus $antivirus)
    {
        return view('admin.antiviruses.edit', [
            'title' => "Редактировать $antivirus->title",
            'data' => $antivirus,
            'media' => $this->getMedia($antivirus, ['preview'])
        ]);
    }

    public function update(Update $request, Antivirus $antivirus)
    {
        $antivirus->update($request->validated());
        $this->syncMedia($antivirus, ['preview']);
        return response([]);
    }

    public function destroy(Delete $request, Antivirus $antivirus)
    {
        $antivirus->delete();
        return response([]);
    }
}
