<?php

namespace App\Http\Controllers\Private\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;

class DestroyController extends Controller
{
    public function __invoke(Project $project)
    {
        $project->news()->delete();
        $project->delete();
        return redirect()->back();
    }
}
