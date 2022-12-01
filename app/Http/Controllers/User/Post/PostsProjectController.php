<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostsProjectController extends Controller
{
    public function __invoke($username, $project_link)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            if (Project::where('user_id', $user->id)->where('link', $project_link)->exists()) {
                $project = Project::where('user_id', $user->id)->where('link', $project_link)->first();

                if (isset($_GET['query']) && $_GET['query'] != '') {
                    //К - Костыль
                    $postsIds = DB::table('posts')
                        ->join('projects', 'posts.project_id', '=', 'projects.id')
                        ->join('users', 'projects.user_id', '=', 'users.id')
                        ->where('users.id', '=', $user->id)
                        ->where('projects.id', '=', $project->id)
                        ->where('posts.title', 'like', '%' . $_GET['query'] . '%')
                        ->orderBy('posts.created_at', 'desc')
                        ->select('posts.id')
                        ->get();
                    $posts = [];
                    foreach ($postsIds as $id) {
                        $posts[] = Post::find($id->id);
                    }
                    $posts = $this->paginate($posts, 10, '', ["path" => url()->current()]);
                    return view('public.user.posts.postsProject', compact('posts', 'user'));
                }
                $posts = $this->paginate($project->posts->reverse(), 10, '', ["path" => url()->current()]);
                return view('public.user.posts.postsProject', compact('posts', 'user'));
            } else {
                abort(420);
            }
        } else {
            abort(418);
        }
    }
}
