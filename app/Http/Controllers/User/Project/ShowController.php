<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class ShowController extends Controller
{

    public function __invoke($user, $project_link)
    {
        $username = explode('/', strip_tags($user));
        $username = $username[0];
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->firstOrFail();
            $link = strip_tags($project_link);
            if (Project::where('user_id', $user->id)->where('link', $link)->exists()) {
                $project = Project::where('user_id', $user->id)->where('link', $link)->first();
                return view('public.user.projects.show', compact('project', 'user'));
            }
            return view('public.error.project404', compact('user', 'link'));
        } else {
            return view('public.error.user404');
        }
    }
}
