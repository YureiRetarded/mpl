<?php

namespace App\Http\Controllers\Auth\ResetPassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetPageController extends Controller
{
    public function __invoke()
    {
        return view('auth.passwords.email');
    }
}
