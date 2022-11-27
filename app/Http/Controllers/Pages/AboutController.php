<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function __invoke()
    {
        return view('public.about');
    }
}
