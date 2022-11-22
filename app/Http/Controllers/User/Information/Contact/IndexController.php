<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($username)
    {
        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            return view('public.user.contactInformation.index', compact('user'));
        } else {
            return view('public.error.user404');
        }
    }
}
