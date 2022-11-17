<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke($user, $news_link)
    {
        $username = explode('/', strip_tags($user));
        $username = $username[0];
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->firstOrFail();
            $link = strip_tags($news_link);
            if (count($user->news->where('link', $link)) === 1) {
                $news = $user->news->where('link', $link)->first();
                return view('public.user.news.show', compact('news', 'user'));
            } else {
                return view('public.error.news404', compact('user', 'link'));
            }
        } else {
            return view('public.error.user404');
        }
    }
}
