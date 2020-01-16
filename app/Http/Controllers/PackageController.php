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
        $extra = $this->getPreview($extra);

        $packages = Package::notExtra()->with('tariffGroups')->get();
        $packages = $this->getPreview($packages);

        $navigation = Navigation::ofUrl('packages')->with('children')->first();
        return view('front.packages.index', [
            'extra' => $extra,
            'packages' => $packages,
            'navigation' => $navigation
        ]);
    }

    protected function getPreview(object $packages) {
        return $packages->each(function($item) {
            $firstMedia = $item->getFirstMedia('preview');
            if($firstMedia) {
                $item->preview = $firstMedia->getUrl('thumb');
            }
        });
    }
}
