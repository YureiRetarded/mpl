<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class NewsProjectController extends Controller
{
    public function __invoke($user, $project)
    {
        $username = $user;
        if (User::where('name', $username)->exists() && Project::where('link', $project)->exists()) {
            $user = User::where('name', $username)->first();
            $project = Project::where('link', $project)->first();
            $news = $user->news->where('project_id', $project->id);
            dd(0);
            $news = $this->paginate($news, 10, '', ["path" => url()->current()]);
            return view('public.user.news.newsProject', compact('news', 'user'));
        } else {
            return view('public.error.user404');
        }
    }
}
