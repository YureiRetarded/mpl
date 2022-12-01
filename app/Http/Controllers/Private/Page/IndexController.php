<?php

namespace App\Http\Controllers\Private\Page;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::count();
        $users = User::count();
        $projects = Project::count();
        return view('private.adminPanel', compact('posts', 'users', 'projects'));
    }
}
