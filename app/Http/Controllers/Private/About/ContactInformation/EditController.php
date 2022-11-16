<?php

namespace App\Http\Controllers\Private\About\ContactInformation;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(ContactInformation $contactInformation){
        return view('private.about.contact_information.edit',compact('contactInformation'));
    }
}
