<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        function getSmallString($count): string
        {
            $string = '';
            if ($count >= 1000 && $count < 1000000) {
                if ($count % 1000 === 0) {
                    $string = ($count / 1000);
                } else {
                    $string = substr($count, 0, -3) . '.' . substr($count, -3, -2);

                    if (substr($string, -1, 1) === '0') {
                        $string = substr($string, 0, -2);
                    }
                }
                return $string .= 'k';
            }
            return $count >= 1000000 ? $string : $count;
        }

        $posts = getSmallString(Post::all()->count());
        $projects = getSmallString(Project::all()->count());
        $users = getSmallString(User::all()->count());

        return view('public.index', compact('posts', 'projects', 'users'));
    }
}
