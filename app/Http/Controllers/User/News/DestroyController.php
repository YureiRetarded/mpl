<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke($user_, $project_link, $news_link)
    {
        $user = auth()->user();
        if (count($user->news->where('link', $news_link)) === 1) {
            $news = $user->news->where('link', $news_link)->first();
            $news->delete();
            return redirect('/user/' . $user->name . '/news/');
        } else {
            $project_title = $user->projects->where('link', $project_link)->first()->name;
            $username = $user->name;
            return view('public.error.news404', compact('username', 'project_title'));
        }
    }
}
