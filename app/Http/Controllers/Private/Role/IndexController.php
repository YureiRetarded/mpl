<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $roles = $this->paginate(Role::where('name', 'like', '%' . $_GET['query'] . '%')->get(),10, '', ["path" => url()->current()]);
            return view('private.roles.index', compact('roles'));
        }
        $roles = $this->paginate(Role::all(),10, '', ["path" => url()->current()]);
        return view('private.roles.index', compact('roles'));
    }
}
