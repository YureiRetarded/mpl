<?php

namespace App\Http\Controllers\User\Information\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke($username,$contactId)
    {
        $user = auth()->user();
        $data = request()->validate([
            'name' => 'string|required|max:50|min:2',
            'value' => 'string|required|max:50|min:2',
        ]);
        $contact=ContactInformation::findOrFail($contactId);
        $contact->update($data);
        return redirect('/user/' . $user->name . '/contacts');
    }
}
