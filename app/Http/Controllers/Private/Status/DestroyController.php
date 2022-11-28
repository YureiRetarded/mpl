<?php

namespace App\Http\Controllers\Private\Status;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Status;

class DestroyController extends Controller
{
    public function __invoke(Status $status)
    {
        $projects = Project::where('status_id', $status->id)->get();
        foreach ($projects as $project) {
            $project->update(['status_id' => 1]);
        }
        $status->delete();
        return redirect()->back();
    }
}
