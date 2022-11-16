<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ShowController extends Controller
{
    public function __invoke(Project $project)
    {
        return view('public.projects.show', compact('project'));
    }
}
