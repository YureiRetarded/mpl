<?php

namespace App\Http\Controllers\Private\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            $tags = Tag::where('name', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->paginate(15);
            return view('private.tags.index', compact('tags'));
        }
        $tags = Tag::orderBy('created_at', 'desc')->paginate(15);
        return view('private.tags.index', compact('tags'));
    }
}
