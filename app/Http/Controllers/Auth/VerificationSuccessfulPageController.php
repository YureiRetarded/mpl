<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class VerificationSuccessfulPageController extends Controller
{
    public function __invoke()
    {
        return view('public.verificationSuccessful');
    }
}
