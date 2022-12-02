<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsPageController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            $posts = Post::where('title', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->paginate(15);
            return view('public.search.indexPosts', compact('posts'));
        }
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('public.search.indexPosts', compact('posts'));
    }
}
