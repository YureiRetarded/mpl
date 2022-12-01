<?php

namespace App\Http\Controllers\Private\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $tags = Tag::where('name', 'like', '%' . $_GET['query'] . '%')->paginate(15);
            return view('private.tags.index', compact('tags'));
        }
        $tags = Tag::paginate(15);
        return view('private.tags.index', compact('tags'));
    }
}
