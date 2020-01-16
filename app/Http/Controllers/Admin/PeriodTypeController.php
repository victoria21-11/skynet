<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PeriodType;
use App\Http\Requests\Admin\PeriodType\{
    Store,
    Update,
    Index,
    Delete
};

class PeriodTypeController extends Controller
{
    public function getTitle()
    {
        return trans('admin.period_types.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = PeriodType::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.period_types.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.period_types.create', [
            'title' => trans('admin.period_types.create'),
        ]);
    }

    public function store(Store $request, PeriodType $periodType)
    {
        $periodType = PeriodType::create($request->validated());
        return response([]);
    }

    public function edit(PeriodType $periodType)
    {
        return view('admin.period_types.edit', [
            'title' => "Редактировать $periodType->title",
            'data' => $periodType,
        ]);
    }

    public function update(Update $request, PeriodType $periodType)
    {
        $periodType->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, PeriodType $periodType)
    {
        $periodType->delete();
        return response([]);
    }
}
