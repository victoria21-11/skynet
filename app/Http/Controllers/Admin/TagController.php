<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Admin\Tag\{
    Store,
    Update,
    Index,
    Delete,
};

class TagController extends Controller
{
    public function search(Index $request)
    {
        $filters = $request->validated();
        $filters['published'] = true;
        $data = Tag::ofFilters($filters)->get();
        return response($data);
    }
}
