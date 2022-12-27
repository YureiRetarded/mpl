<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;

class UpdateLinkController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'link' => ['required', 'string', 'max:50', 'min:3', 'regex:/^[a-z0-9_]+$/u', 'unique:users', 'lowercase'],
        ]);
        $user->update($data);
        return back()->with("statusName", __('messages.link_changed'));
    }
}
