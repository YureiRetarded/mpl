<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;

class DestroyController extends Controller
{
    public function __invoke($link, $contactId)
    {
        $contact = ContactInformation::findOrFail($contactId);
        $contact->delete();
        $user = auth()->user();
        return redirect('/users/' . $user->link . '/contacts');
    }
}
