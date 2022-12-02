<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            $roles = Role::where('name', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->paginate(15);
            return view('private.roles.index', compact('roles'));
        }
        $roles = Role::orderBy('created_at', 'desc')->paginate(15);
        return view('private.roles.index', compact('roles'));
    }
}
