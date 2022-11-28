<?php

namespace App\Http\Controllers\Private\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $tags = $this->paginate(Tag::where('name', 'like', '%' . $_GET['query'] . '%')->get(),10, '', ["path" => url()->current()]);
            return view('private.tags.index', compact('tags'));
        }
        $tags = $this->paginate(Tag::all(),10, '', ["path" => url()->current()]);
        return view('private.tags.index', compact('tags'));
    }
}
