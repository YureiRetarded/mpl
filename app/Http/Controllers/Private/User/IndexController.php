<?php

namespace App\Http\Controllers\Private\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            $users = User::where('name', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->paginate(15);
            return view('private.users.index', compact('users'));
        }
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('private.users.index', compact('users'));
    }
}
