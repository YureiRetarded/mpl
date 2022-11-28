<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('private.roles.create');
    }
}
