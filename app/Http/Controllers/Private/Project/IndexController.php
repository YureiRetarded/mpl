<?php

namespace App\Http\Controllers\Private\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            //Берём проекты по тегу
            $projectTags = Project::orderBy('created_at', 'desc')->whereHas('tags', function ($query) {
                $rawTags = explode(' ', $_GET['query']);
                $query->whereIn('name', $rawTags);
            })->get();
            //Берём проекты по названию
            $projectsTitle = Project::where('title', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->get();
            //Объединяем проекты
            $projectsAll = $projectsTitle->merge($projectTags);
            //Ввыводим их
            $projects = $this->paginate($projectsAll, 10, '', ["path" => url()->current()]);
            return view('private.projects.index', compact('projects'));
        }
        $projects = Project::orderBy('created_at', 'desc')->paginate(15);
        return view('private.projects.index', compact('projects'));
    }
}
