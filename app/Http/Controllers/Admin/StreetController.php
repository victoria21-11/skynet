<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Street;
use App\Http\Requests\Admin\Street\{
    Store,
    Update,
    Index,
    Delete
};

class StreetController extends Controller
{
    public function getTitle()
    {
        return trans('admin.streets.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Street::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.streets.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.streets.create', [
            'title' => trans('admin.streets.create'),
        ]);
    }

    public function store(Store $request, Street $street)
    {
        $street = Street::create($request->validated());
        return response([]);
    }

    public function edit(Street $street)
    {
        return view('admin.streets.edit', [
            'title' => "Редактировать $street->title",
            'data' => $street,
        ]);
    }

    public function update(Update $request, Street $street)
    {
        $street->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Street $street)
    {
        $street->delete();
        return response([]);
    }

    public function search(Index $request)
    {
        $filters = $request->validated();
        $filters['published'] = true;
        $data = Street::ofFilters($filters)->get();
        return response($data);
    }
}
