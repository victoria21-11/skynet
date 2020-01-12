<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Equipment,
    NavparentNavchild,
    Navigation
};

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $equipments = Equipment::get();
        $navigation = NavparentNavchild::ofUrl($request->path())->first()->child;
        $parent = $navigation->parents()->ofUrl('internet')->first();
        return view('front.equipments.index', [
            'equipments' => $equipments,
            'navigation' => $navigation,
            'parent' => $parent,
        ]);
    }

    public function show(Equipment $equipment)
    {
        return view('front.equipments.show', [
            'equipment' => $equipment,
        ]);
    }
}
