<?php

namespace App\Http\Controllers\Private\Page;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Project;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $news = News::count();
        $users = User::count();
        $projects = Project::count();
        return view('private.adminPanel', compact('news', 'users', 'projects'));
    }
}
