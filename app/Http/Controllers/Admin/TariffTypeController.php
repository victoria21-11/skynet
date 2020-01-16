<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TariffType;
use App\Http\Requests\Admin\TariffType\{
    Store,
    Update,
    Index,
    Delete
};

class TariffTypeController extends Controller
{
    public function getTitle()
    {
        return trans('admin.tariff_types.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = TariffType::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));
        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.tariff_types.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.tariff_types.create', [
            'title' => trans('admin.tariff_types.create'),
        ]);
    }

    public function store(Store $request, TariffType $tariffType)
    {
        $tariffType = TariffType::create($request->validated());
        return response([]);
    }

    public function edit(TariffType $tariffType)
    {
        return view('admin.tariff_types.edit', [
            'title' => "Редактировать $tariffType->title",
            'data' => $tariffType,
        ]);
    }

    public function update(Update $request, TariffType $tariffType)
    {
        $tariffType->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, TariffType $tariffType)
    {
        $tariffType->delete();
        return response([]);
    }
}
