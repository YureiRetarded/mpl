<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke($login, $project_link, $post_link)
    {
        if (User::where('login', $login)->exists()) {
            $user = User::where('login', $login)->first();
            if (Project::where('user_id', $user->id)->where('link', $project_link)->exists()) {
                $project = Project::where('user_id', $user->id)->where('link', $project_link)->first();
                if (Post::where('project_id', $project->id)->where('link', $post_link)->exists()) {
                    $post = Post::where('project_id', $project->id)->where('link', $post_link)->first();
                    return view('public.user.posts.show', compact('post', 'user'));
                } else {
                    abort(421);
                }
            } else {
               abort(420);
            }
        } else {
            abort(418);
        }
    }
}
