<?php

namespace App\Http\Controllers\Private\About\ContactInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('private.about.contact_information.index');
    }
}
