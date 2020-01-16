<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Http\Requests\Admin\PaymentMethod\{
    Store,
    Update,
    Index,
    Delete
};

class PaymentMethodController extends Controller
{
    public function getTitle()
    {
        return trans('admin.payment_methods.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = PaymentMethod::ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.payment_methods.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.payment_methods.create', [
            'title' => trans('admin.payment_methods.create'),
        ]);
    }

    public function store(Store $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod = PaymentMethod::create($request->validated());
        return response([]);
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.payment_methods.edit', [
            'title' => "Редактировать $paymentMethod->title",
            'data' => $paymentMethod,
        ]);
    }

    public function update(Update $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return response([]);
    }
}
