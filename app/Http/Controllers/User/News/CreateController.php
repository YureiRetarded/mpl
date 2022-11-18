<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('public.user.news.create');
    }
}
