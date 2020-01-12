<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Package,
    Navigation
};

class PackageController extends Controller
{
    public function index()
    {
        $extra = Package::extra()->with('tariffGroups')->get();
        $packages = Package::notExtra()->with('tariffGroups')->get();
        $navigation = Navigation::ofUrl('packages')->with('children')->first();
        return view('front.packages.index', [
            'extra' => $extra,
            'packages' => $packages,
            'navigation' => $navigation
        ]);
    }
}
