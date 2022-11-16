<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class IndexController extends Controller
{
    public function __invoke()
    {
        $projects = Project::paginate('10');
        return view('public.projects.index', compact('projects'));
    }
}
