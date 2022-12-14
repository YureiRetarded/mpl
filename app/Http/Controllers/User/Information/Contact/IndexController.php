<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke($link)
    {
        if (User::where('link', $link)->exists()) {
            $user = User::where('link', $link)->first();
            if (User::banStatus($user)) {
                $banStatus = true;
                return view('public.user.contactInformation.index', compact('user', 'banStatus'));
            }
            return view('public.user.contactInformation.index', compact('user'));
        } else {
            abort(418);
        }
    }
}
