<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\File\Store;

class FileController extends Controller
{
    public function store(Store $request)
    {
        $path = $request->file('file')->store('temp');
        return response([
            'path' => $path
        ]);
    }
}
