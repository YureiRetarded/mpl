<?php

namespace App\Http\Controllers\Private\Status;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('private.statuses.create');
    }
}
