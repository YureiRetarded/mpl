<?php

namespace App\Http\Controllers\Private\Tag;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('private.tags.create');
    }
}
