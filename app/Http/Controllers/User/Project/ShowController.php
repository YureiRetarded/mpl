<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class ShowController extends Controller
{

    public function __invoke($username, $project_link)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->firstOrFail();
            if (Project::where('user_id', $user->id)->where('link', $project_link)->exists()) {
                $project = Project::where('user_id', $user->id)->where('link', $project_link)->first();
                return view('public.user.projects.show', compact('project', 'user'));
            }
            abort(420);
        } else {
            abort(418);
        }
    }
}
