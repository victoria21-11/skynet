<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TariffGroup;
use App\Http\Requests\Admin\TariffGroup\{
    Store,
    Update,
    Index,
    Delete
};

class TariffGroupController extends Controller
{
    protected $title = 'Группы тарифов';

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = TariffGroup::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.tariff_groups.index', [
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('admin.tariff_groups.create', [
            'title' => "Новая группа тарифов",
        ]);
    }

    public function store(Store $request, TariffGroup $tariffGroup)
    {
        $tariffGroup = TariffGroup::create($request->validated());
        return response([]);
    }

    public function edit(TariffGroup $tariffGroup)
    {
        return view('admin.tariff_groups.edit', [
            'title' => "Редактировать $tariffGroup->title",
            'data' => $tariffGroup,
        ]);
    }

    public function update(Update $request, TariffGroup $tariffGroup)
    {
        $tariffGroup->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, TariffGroup $tariffGroup)
    {
        $tariff->delete();
        return response([]);
    }
}
