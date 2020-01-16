<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Http\Requests\Admin\Package\{
    Store,
    Update,
    Index,
    Delete
};

class PackageController extends Controller
{
    public function getTitle()
    {
        return trans('admin.packages.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Package::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.packages.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.packages.create', [
            'title' => trans('admin.packages.create'),
        ]);
    }

    public function store(Store $request, Package $package)
    {
        $package = Package::create($request->validated());
        $package->syncMedia(['preview']);
        return response([]);
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', [
            'title' => "Редактировать $package->title",
            'data' => $package,
            'media' => $package->prepareMedia(['preview'])
        ]);
    }

    public function update(Update $request, Package $package)
    {
        $package->update($request->validated());
        $package->syncMedia(['preview']);
        return response([]);
    }

    public function destroy(Delete $request, Package $package)
    {
        $package->delete();
        return response([]);
    }
}
