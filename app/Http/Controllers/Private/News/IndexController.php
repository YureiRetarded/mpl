<?php

namespace App\Http\Controllers\Private\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $news = $this->paginate(News::where('title', 'like', '%' . $_GET['query'] . '%')->get(),10, '', ["path" => url()->current()]);
            return view('private.news.index', compact('news'));
        }
        $news = $this->paginate(News::all(),10, '', ["path" => url()->current()]);
        return view('private.news.index', compact('news'));
    }
}
