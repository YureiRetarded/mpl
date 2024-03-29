<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('public.user.contactInformation.create', compact('user'));
    }
}
