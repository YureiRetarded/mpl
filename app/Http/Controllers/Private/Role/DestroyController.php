<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class DestroyController extends Controller
{
    public function __invoke(Role $role)
    {
        $users = User::where('role_id', $role->id)->get();
        foreach ($users as $user) {
            $user->update(['role_id' => 1]);
        }
        $role->delete();
        return redirect()->back();
    }
}
