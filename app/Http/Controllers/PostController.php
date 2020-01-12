<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index(Post $post)
    {
        return view('front.posts.index', [
            'post' => $post
        ]);
    }
}
