<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($username, $project_link, $post_link)
    {
        $user = auth()->user();
        if (count($user->projects->where('link', $project_link)) === 1) {
            $project = $user->projects->where('link', $project_link)->first();
            if (count($project->posts->where('link', $post_link)) === 1) {
                $projects = $user->projects;
                $post = $project->news()->where('link', $post_link)->first();
                return view('public.user.post.edit', compact('post', 'user', 'projects'));
            } else {
                abort(421);
            }
        } else {
            abort(420);
        }
    }
}
