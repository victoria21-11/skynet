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
        $services = Service::withCount('currentUserLikes')
            ->withCount('likes')
            ->get();
        $section = Tree::ofUrl($request->path())->first()->section;
        return view('front.services.index', [
            'services' => $services,
            'section' => $section,
        ]);
    }

    public function show(Service $service)
    {
        $service = $service->loadCount('currentUserLikes')->loadCount('likes');
        return view('front.services.show', [
            'service' => $service,
        ]);
    }
}
