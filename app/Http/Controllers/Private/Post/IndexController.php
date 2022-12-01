<?php

namespace App\Http\Controllers\Private\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            $posts = Post::where('title', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->paginate(15);
            return view('private.posts.index', compact('posts'));
        }
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('private.posts.index', compact('posts'));
    }
}
