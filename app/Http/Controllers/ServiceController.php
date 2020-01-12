<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Service,
    NavparentNavchild
};

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::get();
        $navigation = NavparentNavchild::ofUrl($request->path())->first()->child;
        return view('front.services.index', [
            'services' => $services,
            'navigation' => $navigation,
        ]);
    }

    public function show(Service $service)
    {
        return view('front.services.show', [
            'service' => $service,
        ]);
    }
}
