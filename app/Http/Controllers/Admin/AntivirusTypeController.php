<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AntivirusType;
use App\Http\Requests\Admin\AntivirusType\{
    Store,
    Update,
    Index,
    Delete
};

class AntivirusTypeController extends Controller
{
    public function getTitle()
    {
        return trans('admin.antivirus_types.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = AntivirusType::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.antivirus_types.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.antivirus_types.create', [
            'title' => trans('admin.antivirus_types.create'),
        ]);
    }

    public function store(Store $request, AntivirusType $antivirusType)
    {
        $antivirusType = AntivirusType::create($request->validated());
        return response([]);
    }

    public function edit(AntivirusType $antivirusType)
    {
        return view('admin.antivirus_types.edit', [
            'title' => "Редактировать $antivirusType->title",
            'data' => $antivirusType,
        ]);
    }

    public function update(Update $request, AntivirusType $antivirusType)
    {
        $antivirusType->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, AntivirusType $antivirusType)
    {
        $antivirusType->delete();
        return response([]);
    }
}
