<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AntivirusPeriod;
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
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.antivirus_periods.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.antivirus_periods.create', [
            'title' => trans('admin.antivirus_periods.create'),
        ]);
    }

    public function store(Store $request, AntivirusPeriod $antivirusPeriod)
    {
        $antivirusPeriod = AntivirusPeriod::create($request->validated());
        return response([]);
    }

    public function edit(AntivirusPeriod $antivirusPeriod)
    {
        return view('admin.antivirus_periods.edit', [
            'title' => "Редактировать $antivirusPeriod->title",
            'data' => $antivirusPeriod,
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
