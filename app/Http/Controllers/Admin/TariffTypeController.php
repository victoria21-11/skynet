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
    protected $title = 'Типы тарифов';

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = TariffType::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));
        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.tariff_types.index', [
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('admin.tariff_types.create', [
            'title' => "Новый тип тарифов",
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
        $tariff->delete();
        return response([]);
    }
}
