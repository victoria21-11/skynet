<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\Admin\News\{
    Store,
    Update,
    Index,
    Delete
};

class NewsController extends Controller
{
    public function getTitle()
    {
        return trans('admin.news.title');
    }

    public function index(Index $request)
    {
        $filters = $request->validated();
        $paginatedData = News::ofFilters($filters)
        ->paginate(env('ADMIN_PAGINATION'));

        if($request->ajax()) {
            return response([
                'paginatedData' => $paginatedData,
                'filters' => $filters,
                'request' => http_build_query($filters),
            ]);
        }

        return view('admin.news.index', [
            'title' => $this->getTitle(),
        ]);
    }

    public function create()
    {
        return view('admin.news.create', [
            'title' => trans('admin.news.create'),
        ]);
    }

    public function store(Store $request, News $news)
    {
        $news = News::create($request->validated());
        return response([]);
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'title' => "Редактировать $news->title",
            'data' => $news,
        ]);
    }

    public function update(Update $request, News $news)
    {
        $news->update($request->validated());
        return response([]);
    }

    public function destroy(Delete $request, News $news)
    {
        $news->delete();
        return response([]);
    }
}
