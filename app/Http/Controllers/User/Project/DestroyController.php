<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class DestroyController extends Controller
{
    public function __invoke($user_, $link)
    {
        $user = auth()->user();
        if (Project::where('user_id', $user->id)->where('link', $link)->exists()) {
            $project = Project::where('user_id', $user->id)->where('link', $link)->first();
            $project->delete();
            return redirect('/user/' . $user->name . '/projects/');
        }
        return view('public.error.project404', compact('user', 'link'));
    }
}
