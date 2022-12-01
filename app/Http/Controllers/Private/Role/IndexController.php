<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $roles = Role::where('name', 'like', '%' . $_GET['query'] . '%')->paginate(15);
            return view('private.roles.index', compact('roles'));
        }
        $roles = Role::all()->paginate(15);
        return view('private.roles.index', compact('roles'));
    }
}
