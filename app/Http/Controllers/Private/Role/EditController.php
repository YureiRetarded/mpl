<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class EditController extends Controller
{
    public function __invoke(Role $role)
    {
        return view('private.roles.edit',compact('role'));
    }
}
