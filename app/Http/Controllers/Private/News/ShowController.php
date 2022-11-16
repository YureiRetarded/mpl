<?php

namespace App\Http\Controllers\Private\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(News $news){
        return view('private.news.index',compact('news'));
    }
}
