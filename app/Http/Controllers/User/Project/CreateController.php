<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('public.user.project.create');
    }
}
