<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($login)
    {
        if (User::where('login', $login)->exists()) {
            $user = User::where('login', $login)->first();
            return view('public.user.contactInformation.index', compact('user'));
        } else {
            abort(418);
        }
    }
}
