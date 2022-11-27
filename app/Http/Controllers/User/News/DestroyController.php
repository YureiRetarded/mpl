<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke($username, $project_link, $news_link)
    {
        $user = auth()->user();
        if (count($user->news->where('link', $news_link)) === 1) {
            $news = $user->news->where('link', $news_link)->first();
            $news->delete();
            return redirect('/users/' . $user->name . '/news/');
        } else {
            abort(421);
        }
    }
}
