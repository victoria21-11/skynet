<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Telephone;
use App\Http\Requests\Admin\Telephone\{
    Store,
    Update,
    Index,
    Delete
};

class TelephoneController extends Controller
{
    public function getTitle()
    {
        return trans('admin.telephones.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Telephone::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.telephones.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.telephones.create', [
            'title' => trans('admin.telephones.create'),
        ]);
    }

    public function store(Store $request, Telephone $telephone)
    {
        $telephone = Telephone::create($request->validated());
        return response([]);
    }

    public function edit(Telephone $telephone)
    {
        return view('admin.telephones.edit', [
            'title' => "Редактировать $telephone->title",
            'data' => $telephone,
        ]);
    }

    public function update(Update $request, Telephone $telephone)
    {
        $telephone->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Telephone $telephone)
    {
        $telephone->delete();
        return response([]);
    }
}
