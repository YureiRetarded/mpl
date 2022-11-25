<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($username)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            if (isset($_GET['query'])) {
                $projects = $this->paginate(Project::where('user_id', $user->id)->where('title', 'like', '%' . $_GET['query'] . '%')->get(), 10, '', ["path" => url()->current()]);
                return view('public.user.projects.index', compact('user', 'projects'));
            }
            $projects = $this->paginate($user->projects, 10, '', ["path" => url()->current()]);
            return view('public.user.projects.index', compact('user', 'projects'));
        } else {
            abort(418);
        }
    }
}
