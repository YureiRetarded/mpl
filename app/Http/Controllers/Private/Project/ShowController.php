<?php

namespace App\Http\Controllers\Private\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Project $project){
        return view('private.projects.show',compact('project'));
    }
}
