<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class PostsProjectController extends Controller
{
    public function __invoke($username, $project_link)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            if (Project::where('user_id', $user->id)->where('link', $project_link)->exists()) {
                $project = Project::where('user_id', $user->id)->where('link', $project_link)->first();
                $posts = $project->posts;
                $posts = $this->paginate($posts, 10, '', ["path" => url()->current()]);
                return view('public.user.post.postsProject', compact('posts', 'user'));
            } else {
                abort(420);
            }
        } else {
            abort(418);
        }
    }
}
