<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Admin\Post\{
    Store,
    Update,
    Index,
    Delete
};

class PostController extends Controller
{
    public function getTitle()
    {
        return trans('admin.posts.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = Post::with('navigation')->ofFilters($filters)
            ->orderBy($request->get('sort_column', 'id'), $request->get('sort_direction', 'desc'))
            ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.posts.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'title' => trans('admin.posts.create'),
        ]);
    }

    public function store(Store $request, Post $post)
    {
        $post = Post::create($request->validated());
        return response([]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'title' => "Редактировать $post->title",
            'data' => $post,
        ]);
    }

    public function update(Update $request, Post $post)
    {
        $post->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, Post $post)
    {
        $post->delete();
        return response([]);
    }
}
