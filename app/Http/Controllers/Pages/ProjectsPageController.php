<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsPageController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            //Берём проекты по тегу
            $projectTags = Project::whereHas('tags', function ($query) {
                $rawTags = explode(' ', $_GET['query']);
                $query->whereIn('name', $rawTags);
            })->get();
            //Берём проекты по названию
            $projectsTitle = Project::where('title', 'like', '%' . $_GET['query'] . '%')->get();
            //Объединяем проекты
            $projectsAll = $projectsTitle->merge($projectTags);
            //Ввыводим их
            $projects = $this->paginate($projectsAll, 10, '', ["path" => url()->current()]);
            return view('public.search.indexProjects', compact('projects'));
        }
        $projects = $this->paginate(Project::all(), 10, '', ["path" => url()->current()]);
        return view('public.search.indexProjects', compact('projects'));
    }
}
