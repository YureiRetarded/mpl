<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Project;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke($username, $project_link, $news_link)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            if (Project::where('user_id', $user->id)->where('link', $project_link)->exists()) {
                $project = Project::where('user_id', $user->id)->where('link', $project_link)->first();
                $project_title = $project->title;
                if (News::where('project_id', $project->id)->where('link', $news_link)->exists()) {
                    $news = News::where('project_id', $project->id)->where('link', $news_link)->first();
                    return view('public.user.news.show', compact('news', 'user'));
                } else {
                    return view('public.error.news404', compact('username', 'project_title'));
                }
            } else {
                return view('public.error.project404');
            }
        } else {
            return view('public.error.user404');
        }
    }
}
