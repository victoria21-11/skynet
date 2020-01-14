<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\Admin\Service\{
    Store,
    Update,
    Index,
    Delete
};

class ServiceController extends Controller
{
    public function getTitle()
    {
        return trans('admin.services.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Service::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.services.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.services.create', [
            'title' => trans('admin.services.create'),
        ]);
    }

    public function store(Store $request, Service $service)
    {
        $service = Service::create($request->validated());
        return response([]);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', [
            'title' => "Редактировать $service->title",
            'data' => $service,
        ]);
    }

    public function update(Update $request, Service $service)
    {
        $service->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Service $service)
    {
        $service->delete();
        return response([]);
    }
}
