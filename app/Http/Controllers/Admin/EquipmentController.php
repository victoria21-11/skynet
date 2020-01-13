<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Http\Requests\Admin\Equipment\{
    Store,
    Update,
    Index,
    Delete
};

class EquipmentController extends Controller
{
    public function getTitle()
    {
        return trans('admin.equipments.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Equipment::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.equipments.index', [
            'title' => trans('admin.equipments.create'),
        ]);
    }

    public function create()
    {
        return view('admin.equipments.create', [
            'title' => "Новое оборудование",
        ]);
    }

    public function store(Store $request, Equipment $equipment)
    {
        $equipment = Equipment::create($request->validated());
        return response([]);
    }

    public function edit(Equipment $equipment)
    {
        return view('admin.equipments.edit', [
            'title' => "Редактировать $equipment->title",
            'data' => $equipment,
        ]);
    }

    public function update(Update $request, Equipment $equipment)
    {
        $equipment->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Equipment $equipment)
    {
        $equipment->delete();
        return response([]);
    }
}
