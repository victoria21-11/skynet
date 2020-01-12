<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Telephone,
    Service
};

class TelephoneController extends Controller
{
    public function index()
    {
        $telephones = Telephone::get();
        $services = Service::get();
        return view('front.telephones.index', [
            'telephones' => $telephones,
            'services' => $services,
        ]);
    }
}
