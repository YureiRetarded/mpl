<?php

namespace App\Http\Controllers\Private\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        return view('private.news.index');
    }
}
