<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jobopening;
use App\Http\Requests\Admin\Jobopening\{
    Store,
    Update,
    Index,
    Delete
};

class JobopeningController extends Controller
{
    public function getTitle()
    {
        return trans('admin.jobopenings.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Jobopening::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.jobopenings.index', [
            'title' => trans('admin.jobopenings.create'),
        ]);
    }

    public function create()
    {
        return view('admin.jobopenings.create', [
            'title' => "Новая вакансия",
        ]);
    }

    public function store(Store $request, Jobopening $jobopening)
    {
        $jobopening = Jobopening::create($request->validated());
        return response([]);
    }

    public function edit(Jobopening $jobopening)
    {
        return view('admin.jobopenings.edit', [
            'title' => "Редактировать $jobopening->title",
            'data' => $jobopening,
        ]);
    }

    public function update(Update $request, Jobopening $jobopening)
    {
        $jobopening->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Jobopening $jobopening)
    {
        $jobopening->delete();
        return response([]);
    }
}
