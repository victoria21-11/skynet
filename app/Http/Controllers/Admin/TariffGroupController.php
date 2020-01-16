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
    public function getTitle()
    {
        return trans('admin.tariff_groups.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = TariffGroup::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.tariff_groups.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.tariff_groups.create', [
            'title' => trans('admin.tariff_groups.create'),
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
        $tariffGroup->delete();
        return response([]);
    }
}
