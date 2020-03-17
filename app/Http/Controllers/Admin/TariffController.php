<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Tariff,
    TariffGroup,
    PeriodType,
    TariffType,
};
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
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->ofFilters($filters)
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        $tariffGroups = TariffGroup::get()->toArray();
        $periodTypes = PeriodType::get()->toArray();
        $tariffTypes = TariffType::get()->toArray();

        return view('admin.tariffs.index', [
            'title' => $this->getTitle(),
            'tariffGroups' => $tariffGroups,
            'periodTypes' => $periodTypes,
            'tariffTypes' => $tariffTypes,
        ]);
    }

    public function create()
    {
        $tariffGroups = TariffGroup::get()->toArray();
        $periodTypes = PeriodType::get()->toArray();
        return view('admin.tariffs.create', [
            'title' => trans('admin.tariffs.create'),
            'tariffGroups' => $tariffGroups,
            'periodTypes' => $periodTypes,
        ]);
    }

    public function store(Store $request, Tariff $tariff)
    {
        $tariff = Tariff::create($request->validated());
        return response([]);
    }

    public function edit(Tariff $tariff)
    {
        $tariffGroups = TariffGroup::get()->toArray();
        $periodTypes = PeriodType::get()->toArray();
        return view('admin.tariffs.edit', [
            'title' => "Редактировать $tariff->title",
            'data' => $tariff,
            'tariffGroups' => $tariffGroups,
            'periodTypes' => $periodTypes,
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

    public function sync(Request $request) {
        dd(1);
    }
}
