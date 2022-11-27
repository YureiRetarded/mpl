<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('public.user.setting');
    }
}
