<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class IndexController extends Controller
{
    public function __invoke()
    {
        $news = News::paginate(10);
        return view('public.news.index', compact('news'));
    }
}
