<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tariff;
use App\Http\Requests\Admin\Tariff\{
    Store,
    Update,
    Index,
    Delete
};

class TariffController extends Controller
{
    public function getTitle()
    {
        return trans('admin.tariffs.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Tariff::with('group.type', 'periodType')
        ->ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.tariffs.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.tariffs.create', [
            'title' => trans('admin.tariffs.create'),
        ]);
    }

    public function store(Store $request, Tariff $tariff)
    {
        $tariff = Tariff::create($request->validated());
        return response([]);
    }

    public function edit(Tariff $tariff)
    {
        return view('admin.tariffs.edit', [
            'title' => "Редактировать $tariff->title",
            'data' => $tariff,
        ]);
    }

    public function update(Update $request, Tariff $tariff)
    {
        $tariff->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Tariff $tariff)
    {
        $tariff->delete();
        return response([]);
    }
}
