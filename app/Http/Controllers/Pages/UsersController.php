<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query'])) {
            $users = $this->paginate(User::where('name', 'like', '%' . $_GET['query'] . '%')->get(),10, '', ["path" => url()->current()]);
            return view('public.search.indexUsers', compact('users'));
        }
        $users = $this->paginate(User::all(),10, '', ["path" => url()->current()]);
        return view('public.search.indexUsers', compact('users'));
    }
}
