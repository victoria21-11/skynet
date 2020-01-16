<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\Http\Requests\Admin\GlobalSetting\{
    Store,
    Update,
    Index,
    Delete
};

class GlobalSettingController extends Controller
{
    public function getTitle()
    {
        return trans('admin.global_settings.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = GlobalSetting::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.global_settings.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.global_settings.create', [
            'title' => trans('admin.global_settings.create'),
        ]);
    }

    public function store(Store $request, GlobalSetting $globalSetting)
    {
        $globalSetting = GlobalSetting::create($request->validated());
        $globalSetting->syncMedia(['image']);
        $image = $globalSetting->getFirstMediaUrl('image');
        if($image && !$globalSetting->value) {
            $globalSetting->value = $image;
            $globalSetting->save();
        }
        return response([]);
    }

    public function edit(GlobalSetting $globalSetting)
    {
        return view('admin.global_settings.edit', [
            'title' => "Редактировать $globalSetting->title",
            'data' => $globalSetting,
            'media' => $globalSetting->prepareMedia(['image'])
        ]);
    }

    public function update(Update $request, GlobalSetting $globalSetting)
    {
        $globalSetting->update($request->validated());
        $globalSetting->syncMedia(['image']);
        $image = $globalSetting->getFirstMediaUrl('image');
        if($image && !$globalSetting->value) {
            $globalSetting->value = $image;
            $globalSetting->save();
        }
        return response([]);
    }

    public function destroy(Delete $request, GlobalSetting $globalSetting)
    {
        $globalSetting->delete();
        return response([]);
    }
}
