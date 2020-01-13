<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\House;
use App\Http\Requests\Admin\House\{
    Store,
    Update,
    Index,
    Delete
};

class HouseController extends Controller
{
    public function getTitle()
    {
        return trans('admin.houses.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = House::with('street')->ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.houses.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.houses.create', [
            'title' => trans('admin.houses.create'),
        ]);
    }

    public function store(Store $request, House $house)
    {
        $house = House::create($request->validated());
        return response([]);
    }

    public function edit(House $house)
    {
        return view('admin.houses.edit', [
            'title' => "Редактировать $house->title",
            'data' => $house,
        ]);
    }

    public function update(Update $request, House $house)
    {
        $house->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, House $house)
    {
        $house->delete();
        return response([]);
    }
}
