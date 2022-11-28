<?php

namespace App\Http\Controllers\Private\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;

class EditController extends Controller
{
    public function __invoke(Status $status)
    {
        return view('private.statuses.edit',compact('status'));
    }
}
