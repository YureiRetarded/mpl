<?php

namespace App\Http\Controllers\Auth\ResetPassword;

use App\Http\Controllers\Controller;

class GetPageResetController extends Controller
{
    public function __invoke($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }
}
