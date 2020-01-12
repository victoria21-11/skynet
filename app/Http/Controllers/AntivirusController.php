<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    AntivirusType,
    Navigation,
    NavparentNavchild
};

class AntivirusController extends Controller
{
    public function index(Request $request)
    {
        $antiviruses = AntivirusType::with('antiviruses.periods')->get();
        $navigation = NavparentNavchild::ofUrl($request->path())->first()->child;
        $parent = $navigation->parents()->ofUrl('internet')->first();
        return view('front.antiviruses.index', [
            'antiviruses' => $antiviruses,
            'navigation' => $navigation,
            'parent' => $parent,
        ]);
    }

    public function show(AntivirusType $antivirusType)
    {
        return view('front.antiviruses.show', [
            'antivirusType' => $antivirusType->load('antiviruses.periods'),
        ]);
    }
}
