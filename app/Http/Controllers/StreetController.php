<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Street,
    House
};
use App\Http\Requests\{
    IndexStreet,
    SearchHousesStreet
};

class StreetController extends Controller
{
    public function index(IndexStreet $request)
    {
        $data = [
            'streets' => Street::ofTitle($request->get('title', ''))->get()
        ];
        return response($data);
    }

    public function searchHouses(Street $street, SearchHousesStreet $request)
    {
        $data = [
            'houses' => $street->houses()->ofTitle($request->title)->get()
        ];
        return response($data);
    }
}
