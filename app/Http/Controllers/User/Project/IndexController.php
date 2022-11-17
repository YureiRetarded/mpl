<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($request)
    {
        $username = explode('/', strip_tags($request));
        $username = $username[0];
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            $projects = $this->paginate($user->projects, 10, '', ["path" => url()->current()]);
            return view('public.user.projects.index', compact('user', 'projects'));
        } else {
            return view('public.error.user404');
        }
    }
}
