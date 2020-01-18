<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    AntivirusType,
    Navigation,
    Tree,
};

class AntivirusController extends Controller
{
    public function index(Request $request)
    {
        $antiviruses = AntivirusType::with('antiviruses.periods')->get();
        $section = Tree::ofUrl($request->path())->first()->section;
        return view('front.antiviruses.index', [
            'antiviruses' => $antiviruses,
            'section' => $section,
        ]);
    }

    public function show(AntivirusType $antivirusType)
    {
        $antiviruses = $antivirusType->antiviruses->each(function($item) {
            $firstMedia = $item->getFirstMedia('preview');
            if($firstMedia) {
                $item->preview = $firstMedia->getUrl('thumb');
            }
        });
        return view('front.antiviruses.show', [
            'antivirusType' => $antivirusType,
            'antiviruses' => $antiviruses,
        ]);
    }
}
