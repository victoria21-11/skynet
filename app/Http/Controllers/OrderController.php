<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Tariff,
    TariffGroup,
    Order
};
use App\Http\Requests\Front\Order\{
    Store,
    Update
};

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tariffGroups' => TariffGroup::with('tariffs', 'tariffs.group', 'tariffs.periodType')->get()->each(function($group) {
                $group->append('max_period_tariff');
            })
        ];
        // dd($data);
        return view('front.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $order = Order::create($request->validated());
        return response([
            'order' => $order
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Order $order)
    {
        $order->update($request->validated());
        return response([
            'order' => Order::find($order->id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkPromocode(Request $request)
    {
        return response([
        ]);
    }
}
