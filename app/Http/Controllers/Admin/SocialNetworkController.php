<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use App\Http\Requests\Admin\SocialNetwork\{
    Store,
    Update,
    Index,
    Delete
};

class SocialNetworkController extends Controller
{
    public function getTitle()
    {
        return trans('admin.social_networks.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = SocialNetwork::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.social_networks.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.social_networks.create', [
            'title' => trans('admin.social_networks.create'),
        ]);
    }

    public function store(Store $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork = SocialNetwork::create($request->validated());
        $socialNetwork->syncMedia(['icon']);
        return response([]);
    }

    public function edit(SocialNetwork $socialNetwork)
    {
        return view('admin.social_networks.edit', [
            'title' => "Редактировать $socialNetwork->title",
            'data' => $socialNetwork,
            'media' => $socialNetwork->prepareMedia(['icon']),
        ]);
    }

    public function update(Update $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork->update($request->validated());
        $socialNetwork->syncMedia(['icon']);
        return response([]);
    }

    public function destroy(Delete $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork->delete();
        return response([]);
    }
}
