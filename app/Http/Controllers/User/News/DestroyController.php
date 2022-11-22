<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class DestroyController extends Controller
{
    public function __invoke($user_, $link)
    {
        $user = auth()->user()->name;
            if (count($user->news->where('link', $link)) === 1) {
                $news = $user->news->where('link', $link);
                $news->delete();
                $news=$user->news;
                return view('public.user.news.show', compact('news', 'user'));
            } else {
                return view('public.error.news404', compact('user', 'link'));
            }
    }
}
