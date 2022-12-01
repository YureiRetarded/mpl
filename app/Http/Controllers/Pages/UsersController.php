<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])&& $_GET['query'] != '') {
            $users = User::where('name', 'like', '%' . $_GET['query'] . '%')->orderBy('created_at', 'desc')->paginate(15);
            return view('public.search.indexUsers', compact('users'));
        }
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('public.search.indexUsers', compact('users'));
    }
}
