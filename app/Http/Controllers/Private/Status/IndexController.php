<?php

namespace App\Http\Controllers\Private\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            $statuses = Status::where('name', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->paginate(15);
            return view('private.statuses.index', compact('statuses'));
        }
        $statuses = Status::orderBy('created_at', 'desc')->paginate(15);
        return view('private.statuses.index', compact('statuses'));
    }
}
