<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function __invoke()
    {
        $users = User::paginate(10);
        return view('public.users', compact('users'));
    }
}
