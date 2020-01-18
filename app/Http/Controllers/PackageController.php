<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Package,
    Tree
};

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $extra = Package::extra()->with('tariffGroups')->get();
        $extra = $this->getPreview($extra);

        $packages = Package::notExtra()->with('tariffGroups')->get();
        $packages = $this->getPreview($packages);

        $section = Tree::ofUrl($request->path())->with('section')->first()->section;
        return view('front.packages.index', [
            'extra' => $extra,
            'packages' => $packages,
            'section' => $section
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
