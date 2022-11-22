<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($username_no_use, $project_link, $news_link)
    {
        $user = auth()->user();
        $username = $user->name;
        if (count($user->projects->where('link', $project_link)) === 1) {
            $project = $user->projects->where('link', $project_link)->first();
            $project_title = $project->title;
            if (count($project->news->where('link', $news_link)) === 1) {
                $projects = $user->projects;
                $news = $project->news()->where('link', $news_link)->first();
                return view('public.user.news.edit', compact('news', 'user', 'projects'));
            } else {
                return view('public.error.news404', compact('username', 'project_title'));
            }
        } else {
            return view('public.error.project404', compact('user'));
        }
    }
}
