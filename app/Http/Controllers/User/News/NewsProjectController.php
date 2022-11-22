<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class NewsProjectController extends Controller
{
    public function __invoke($username, $project_link)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            if (Project::where('user_id', $user->id)->where('link', $project_link)->exists()) {
                $project = Project::where('user_id', $user->id)->where('link', $project_link)->first();
                $news = $project->news;
                $news = $this->paginate($news, 10, '', ["path" => url()->current()]);
                return view('public.user.news.newsProject', compact('news', 'user'));
            } else {
                return view('public.error.project404');
            }
        } else {
            return view('public.error.user404');
        }
    }
}
