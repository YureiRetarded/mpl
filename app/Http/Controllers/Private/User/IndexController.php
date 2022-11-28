<?php

namespace App\Http\Controllers\Private\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $users = $this->paginate(User::where('name', 'like', '%' . $_GET['query'] . '%')->get(), 10, '', ["path" => url()->current()]);
            return view('private.users.index', compact('users'));
        }
        $users = $this->paginate(User::all(), 10, '', ["path" => url()->current()]);
        return view('private.users.index', compact('users'));
    }
}
