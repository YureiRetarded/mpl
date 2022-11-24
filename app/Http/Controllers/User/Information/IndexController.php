<?php

namespace App\Http\Controllers\User\Information;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($username)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            return view('public.user.index',compact('user'));
        } else {
            abort(418);
        }
    }
}
