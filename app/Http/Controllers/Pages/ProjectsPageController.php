<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsPageController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $projects = $this->paginate(Project::where('title', 'like', '%' . $_GET['query'] . '%')->get(),10, '', ["path" => url()->current()]);
            return view('public.search.indexProjects', compact('projects'));
        }
        $projects = $this->paginate(Project::all(),10, '', ["path" => url()->current()]);
        return view('public.search.indexProjects', compact('projects'));
    }
}
