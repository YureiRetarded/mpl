<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user=auth()->user();
        $projects=$user->projects;
        return view('public.user.news.create',compact('user','projects'));
    }
}
