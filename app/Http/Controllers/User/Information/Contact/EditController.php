<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($login,$contactId)
    {
        $user=auth()->user();
        $contact=ContactInformation::findOrFail($contactId);
        return view('public.user.contactInformation.edit',compact('user','contact'));
    }
}
