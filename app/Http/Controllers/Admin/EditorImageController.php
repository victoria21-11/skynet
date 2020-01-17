<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EditorImage;
use Illuminate\Support\Str;

class EditorImageController extends Controller
{

    public function store(Request $request) {
        $editorImage = EditorImage::create();
        $image = $editorImage->addMediaFromRequest('image')
            ->usingFileName(Str::random(40))
            ->toMediaCollection('image');
        return response([
            'url' => $image->getUrl()
        ]);
    }

}
