<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Street,
    House
};

class StreetController extends Controller
{
    public function index(Request $request)
    {
        $data = Street::ofTitle($request->get('title', ''))->get();
        return response($data);
    }

    public function searchHouses(Street $street, Request $request)
    {
        $data = $street->houses()->ofTitle($request->title)->get();
        return response($data);
    }
}
