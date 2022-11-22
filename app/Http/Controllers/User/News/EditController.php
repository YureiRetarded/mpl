<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke($user_, $news_link)
    {
        $user=auth()->user();
        $projects=$user->projects;
        $link = strip_tags($news_link);
        if (count($user->news->where('link', $link)) === 1) {
            $news = $user->news->where('link', $link)->first();
            return view('public.user.news.edit', compact('news', 'user','projects'));
        } else {
            return view('public.error.news404', compact('user', 'link'));
        }
    }
}
