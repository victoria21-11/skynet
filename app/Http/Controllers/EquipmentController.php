<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Equipment,
    Tree,
};

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $equipments = Equipment::withCount('currentUserLikes')
            ->withCount('likes')
            ->get();
        $section = Tree::ofUrl($request->path())->first()->section;
        return view('front.equipments.index', [
            'equipments' => $equipments,
            'section' => $section,
        ]);
    }

    public function show(Equipment $equipment)
    {
        $equipment = $equipment->loadCount('currentUserLikes')->loadCount('likes');
        return view('front.equipments.show', [
            'equipment' => $equipment,
        ]);
    }
}
