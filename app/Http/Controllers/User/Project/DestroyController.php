<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class DestroyController extends Controller
{
    public function __invoke($username, $project_link)
    {
        $user = auth()->user();
        if (Project::where('user_id', $user->id)->where('link', $project_link)->exists()) {
            $project = Project::where('user_id', $user->id)->where('link', $project_link)->first();
            $project->posts()->delete();
            $project->delete();
            return redirect('/users/' . $user->link . '/projects/');
        }
        abort(420);
    }
}
