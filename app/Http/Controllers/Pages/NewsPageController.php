<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;

class NewsPageController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {

            $news = $this->paginate(News::where('title', 'like', '%' . $_GET['query'] . '%')->get(),10, '', ["path" => url()->current()]);
            return view('public.search.indexNews', compact('news'));
        }
        $news = $this->paginate(News::all());
        return view('public.search.indexNews', compact('news'));
    }
}
