<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($link)
    {
        if (User::where('link', $link)->exists()) {
            $user = User::where('link', $link)->first();
            if (User::banStatus($user)) {
                $projects = [];
                $banStatus = true;
                return view('public.user.projects.index', compact('user', 'projects', 'banStatus'));
            }
            if (isset($_GET['query']) && $_GET['query'] != '') {

                //Берём проекты по тегу
                $projectTags = Project::orderBy('created_at', 'desc')->whereHas('tags', function ($query) {
                    $rawTags = explode(' ', $_GET['query']);
                    $query->whereIn('name', $rawTags);
                })->where('user_id', $user->id)->get();
                //Берём проекты по названию
                $projectsTitle = Project::where('title', 'like', '%' . $_GET['query'] . '%')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
                //Объединяем проекты
                $projectsAll = $projectsTitle->merge($projectTags);
                //Ввыводим их
                $projects = $this->paginate($projectsAll, 10, '', ["path" => url()->current()]);
                return view('public.user.projects.index', compact('user', 'projects'));
            }
            $projects = $this->paginate($user->projects->reverse(), 10, '', ["path" => url()->current()]);
            return view('public.user.projects.index', compact('user', 'projects'));
        } else {
            abort(418);
        }
    }
}
