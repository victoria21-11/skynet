<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(12);
        return view('front.news.index', [
            'news' => $news
        ]);
    }

    public function show(News $news)
    {
        $moreNews = News::where('id', '!=', $news->id)->take(3)->get();
        return view('front.news.show', [
            'news' => $news,
            'moreNews' => $moreNews
        ]);
    }
}
