<?php

namespace App\Http\Controllers\User\News;

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
            $news = $this->paginate($user->news, 10, '', ["path" => url()->current()]);
            return view('public.user.news.index', compact('user', 'news'));
        } else {
            return view('public.error.user404');
        }
    }


}
