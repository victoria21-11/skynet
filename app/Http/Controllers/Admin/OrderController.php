<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\Admin\Order\{
    Store,
    Update,
    Index,
    Delete
};

class OrderController extends Controller
{

    public function getTitle()
    {
        return trans('admin.orders.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Order::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.orders.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.orders.create', [
            'title' => trans('admin.orders.create'),
        ]);
    }

    public function store(Store $request, Order $order)
    {
        $order = Order::create($request->validated());
        return response([]);
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'title' => "Редактировать $order->title",
            'data' => $order,
        ]);
    }

    public function update(Update $request, Order $order)
    {
        $order->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Order $order)
    {
        $order->delete();
        return response([]);
    }
}
