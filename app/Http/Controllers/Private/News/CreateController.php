<?php

namespace App\Http\Controllers\Private\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(){
        return view('private.news.create');
    }
}
