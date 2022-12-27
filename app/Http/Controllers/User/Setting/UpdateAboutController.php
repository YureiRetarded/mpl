<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;

class UpdateAboutController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'about' => 'string|max:10000',
        ]);

        $user->update($data);
        return back()->with("statusAbout", __('messages.description_changed'));
    }
}
