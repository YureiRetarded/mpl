<?php

namespace App\Http\Controllers\User\Information;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('public.user.aboutEdit', compact('user'));
    }
}
