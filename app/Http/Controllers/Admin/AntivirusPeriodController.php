<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    AntivirusPeriod,
    Antivirus,
    PeriodType
};
use App\Http\Requests\Admin\AntivirusPeriod\{
    Store,
    Update,
    Index,
    Delete
};

class AntivirusPeriodController extends Controller
{
    public function getTitle()
    {
        return trans('admin.antivirus_periods.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = AntivirusPeriod::with('periodType', 'antivirus')->ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        $antiviruses = Antivirus::get()->toArray();
        $periodTypes = PeriodType::get()->toArray();

        return view('admin.antivirus_periods.index', [
            'title' => $this->getTitle(),
            'antiviruses' => $antiviruses,
            'periodTypes' => $periodTypes,
        ]);
    }

    public function create()
    {
        $antiviruses = Antivirus::get()->toArray();
        $periodTypes = PeriodType::get()->toArray();
        return view('admin.antivirus_periods.create', [
            'title' => trans('admin.antivirus_periods.create'),
            'antiviruses' => $antiviruses,
            'periodTypes' => $periodTypes,
        ]);
    }

    public function store(Store $request, AntivirusPeriod $antivirusPeriod)
    {
        $antivirusPeriod = AntivirusPeriod::create($request->validated());
        return response([]);
    }

    public function edit(AntivirusPeriod $antivirusPeriod)
    {
        $antiviruses = Antivirus::get()->toArray();
        $periodTypes = PeriodType::get()->toArray();
        return view('admin.antivirus_periods.edit', [
            'title' => "Редактировать $antivirusPeriod->title",
            'data' => $antivirusPeriod,
            'antiviruses' => $antiviruses,
            'periodTypes' => $periodTypes,
        ]);
    }

    public function update(Update $request, AntivirusPeriod $antivirusPeriod)
    {
        $antivirusPeriod->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, AntivirusPeriod $antivirusPeriod)
    {
        $antivirusPeriod->delete();
        return response([]);
    }
}
