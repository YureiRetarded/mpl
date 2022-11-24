<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($username, $project_link, $news_link)
    {
        $user = auth()->user();
        if (count($user->projects->where('link', $project_link)) === 1) {
            $project = $user->projects->where('link', $project_link)->first();
            if (count($project->news->where('link', $news_link)) === 1) {
                $projects = $user->projects;
                $news = $project->news()->where('link', $news_link)->first();
                return view('public.user.news.edit', compact('news', 'user', 'projects'));
            } else {
                abort(421);
            }
        } else {
            abort(420);
        }
    }
}
