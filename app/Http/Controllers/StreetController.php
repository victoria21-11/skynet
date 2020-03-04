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
        $streets = Street::ofTitle($request->get('title', ''))->get();
        return response($streets);
    }

    public function searchHouses(Street $street, SearchHousesStreet $request)
    {
        $data = [
            'houses' => $street->houses()->ofTitle($request->title)->get()
        ];
        return response($data);
    }
}
