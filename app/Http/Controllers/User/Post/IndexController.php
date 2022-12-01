<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function __invoke($username)
    {

        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            //К - Костыль
            if (isset($_GET['query']) && $_GET['query'] != '') {
                $postsIds = DB::table('news')
                    ->join('projects', 'posts.project_id', '=', 'projects.id')
                    ->join('users', 'projects.user_id', '=', 'users.id')
                    ->where('users.id', '=', $user->id)
                    ->where('posts.title', 'like', '%' . $_GET['query'] . '%')
                    ->where('posts.deleted_at', '=', null)
                    ->select('posts.id')
                    ->get();
                $posts = [];
                foreach ($postsIds as $id) {
                    $posts[] = Post::find($id->id);
                }
                $posts = $this->paginate($posts, 10, '', ["path" => url()->current()]);
                return view('public.user.posts.index', compact('user', 'posts'));
            }
            $posts = $user->posts->reverse()->paginate(15);
            return view('public.user.posts.index', compact('user', 'posts'));
        } else {
            abort(418);
        }
    }
}
