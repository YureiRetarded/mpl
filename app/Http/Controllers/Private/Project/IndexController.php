<?php

namespace App\Http\Controllers\Private\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        return view('private.projects.index');
    }
}
