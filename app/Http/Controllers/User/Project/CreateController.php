<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\PublicAccessLevel;
use App\Models\Status;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user=auth()->user();
        $statuses=Status::all();
        $levels=PublicAccessLevel::all();
        return view('public.user.projects.create',compact('statuses','user','levels'));
    }
}
