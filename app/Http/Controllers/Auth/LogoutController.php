<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function __invoke()
    {
        $lang = Session::get('applocale');
        Session::flush();
        Auth::logout();
        Session::put('applocale', $lang);
        return redirect()->back();
    }
}
