<?php

namespace App\Http\Controllers\Private\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $roles = Role::all();
        return view('private.users.edit', compact('user', 'roles'));
    }
}
