<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;

class StoreController extends Controller
{
    public function __invoke($link)
    {
        $user = auth()->user();
        $data = request()->validate([
            'name' => 'string|required|max:50|min:2',
            'value' => 'string|required|max:50|min:2',
        ]);
        $contact = ContactInformation::create($data);
        $user->contactInformation()->attach($contact->id);
        return redirect('/users/' . $user->link . '/contacts');
    }
}
