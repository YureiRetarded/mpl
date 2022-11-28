<?php

namespace App\Http\Controllers\Private\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $statuses = $this->paginate(Status::where('name', 'like', '%' . $_GET['query'] . '%')->get(), 10, '', ["path" => url()->current()]);
            return view('private.statuses.index', compact('statuses'));
        }
        $statuses = $this->paginate(Status::all(), 10, '', ["path" => url()->current()]);
        return view('private.statuses.index', compact('statuses'));
    }
}
