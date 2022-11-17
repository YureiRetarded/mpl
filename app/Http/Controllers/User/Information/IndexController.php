<?php

namespace App\Http\Controllers\User\Information;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($request)
    {
        $username = explode('/', strip_tags($request));
        $username = $username[0];
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            $news= $user->news;
            //dd($news->count());
            return view('public.user.index',compact('user'));
        } else {
            return view('public.error.user404');
        }
    }
}
