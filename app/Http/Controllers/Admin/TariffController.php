<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tariff;
use App\Http\Requests\Admin\Tariff\{
    Store,
    Update
};

class TariffController extends Controller
{
    protected $title = 'Тарифы';

    public function index(Request $request)
    {
        $paginatedData = Tariff::with('group.type', 'periodType')
        ->ofFilters($request)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData
            ]);
        }

        return view('admin.tariffs.index', [
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('admin.tariffs.create', [
            'title' => "Новый тариф",
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

    public function destroy(Tariff $tariff)
    {
        $tariff->delete();
        return response();
    }
}
