<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostsPageController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query']) && $_GET['query'] != '') {
            $postsIds = DB::table('posts')
                ->join('projects', 'posts.project_id', '=', 'projects.id')
                ->join('users', 'projects.user_id', '=', 'users.id')
                ->where('users.isBan', '=', 0)
                ->where('posts.title', 'like', '%' . $_GET['query'] . '%')
                ->orderBy('posts.created_at', 'desc')
                ->select('posts.id')
                ->get();
            $posts = [];
            foreach ($postsIds as $id) {
                $posts[] = Post::find($id->id);
            }
            $posts = $this->paginate($posts, 10, '', ["path" => url()->current()]);
            return view('public.search.indexPosts', compact('posts'));
        }
        $postsIds = DB::table('posts')
            ->join('projects', 'posts.project_id', '=', 'projects.id')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->where('users.isBan', '=', 0)
            ->orderBy('posts.created_at', 'desc')
            ->select('posts.id')
            ->get();
        $posts = [];
        foreach ($postsIds as $id) {
            $posts[] = Post::find($id->id);
        }
        $posts = $this->paginate($posts, 10, '', ["path" => url()->current()]);
        return view('public.search.indexPosts', compact('posts'));
    }
}
