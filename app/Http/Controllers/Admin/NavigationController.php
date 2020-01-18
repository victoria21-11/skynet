<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Navigation,
};
use App\Http\Requests\Admin\Navigation\{
    Store,
    Update,
    Index,
    Delete,
    Order
};

class NavigationController extends Controller
{
    public function getTitle()
    {
        return trans('admin.trees.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Navigation::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));
        $tree = NavparentNavchild::with('parent', 'child')
            ->orderBy('order', 'asc')
            ->get()
            ->keyBy('id')
            ->groupBy('parent_id')
            ->sortKeys();
        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.trees.index', [
            'title' => $this->getTitle(),
            'tree' => $tree
        ]);
    }

    public function create()
    {
        return view('admin.trees.create', [
            'title' => trans('admin.trees.create'),
        ]);
    }

    public function store(Store $request, Navigation $navigation)
    {
        $navigation = Navigation::create($request->validated());
        return response([]);
    }

    public function edit(Navigation $navigation)
    {
        return view('admin.trees.edit', [
            'title' => "Редактировать $navigation->title",
            'data' => $navigation,
        ]);
    }

    public function update(Update $request, Navigation $navigation)
    {
        $navigation->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Navigation $navigation)
    {
        $navigation->delete();
        return response([]);
    }

    public function order(Order $request)
    {
        foreach ($request->get('order', []) as $value) {
            NavparentNavchild::where('id', $value['id'])->update([
                'order' => $value['order']
            ]);
        }
        return response([]);
    }
}
