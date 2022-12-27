<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowAboutController extends Controller
{
    public function __invoke()
    {
        $user=auth()->user();
        return view('public.user.description',compact('user'));
    }
}
