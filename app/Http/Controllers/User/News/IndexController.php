<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\User;


class IndexController extends Controller
{
    public function __invoke($username)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            if (isset($_GET['query']) && $_GET['query'] != '') {
                $news = $this->paginate($user->news->where('title', $_GET['query']), 10, '', ["path" => url()->current()]);
                return view('public.user.news.index', compact('user', 'news'));
            }
            $news = $this->paginate($user->news, 10, '', ["path" => url()->current()]);
            return view('public.user.news.index', compact('user', 'news'));
        } else {
            abort(418);
        }
    }
}
