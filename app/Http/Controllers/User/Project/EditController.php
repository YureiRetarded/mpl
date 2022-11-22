<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\PublicAccessLevel;
use App\Models\Status;

class EditController extends Controller
{
    public function __invoke($user_, $project_link)
    {
        $user = auth()->user();
        $link = strip_tags($project_link);
        $statuses=Status::all();
        $levels=PublicAccessLevel::all();
        if (Project::where('user_id', $user->id)->where('link', $link)->exists()) {
            $project = Project::where('user_id', $user->id)->where('link', $link)->first();
            $tags='';
            foreach ($project->tags as $tag){
                $tags=$tags.' '.$tag->name;
            }
            return view('public.user.projects.edit', compact('project', 'user','statuses', 'levels','tags'));
        }
        return view('public.error.project404', compact('user', 'statuses'));
    }
}
