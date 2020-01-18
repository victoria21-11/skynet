<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Service,
    Tree,
};

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::get();
        $section = Tree::ofUrl($request->path())->first()->section;
        return view('front.services.index', [
            'services' => $services,
            'section' => $section,
        ]);
    }

    public function show(Service $service)
    {
        return view('front.services.show', [
            'service' => $service,
        ]);
    }
}
