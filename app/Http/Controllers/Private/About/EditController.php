<?php

namespace App\Http\Controllers\Private\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke()
    {
        return view('private.about.edit');
    }
}
