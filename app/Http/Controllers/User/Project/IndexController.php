<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($username)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            $projects = $this->paginate($user->projects, 10, '', ["path" => url()->current()]);
            return view('public.user.projects.index', compact('user', 'projects'));
        } else {
            abort(418);
        }
    }
}
