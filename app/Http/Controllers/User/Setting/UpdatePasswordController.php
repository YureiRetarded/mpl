<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function __invoke()
    {
        //Валидация
        $data = request()->validate([
            'old_password' => 'required|regex:/^[a-zA-Z0-9_ \!\@\#\№\%\:\&\.\,\?\*\(\)\-\_\=\+\}\{\[\]\<\>\$\^\;]+$/ui|min:8|max:512|string',
            'new_password' => 'required|confirmed|regex:/^[a-zA-Z0-9_ \!\@\#\№\%\:\&\.\,\?\*\(\)\-\_\=\+\}\{\[\]\<\>\$\^\;]+$/ui|min:8|max:512|string'
        ]);

        if ($data['old_password'] === $data['new_password']) {
            return back()->with("statusPasswordError", __('messages.status_password_error1'));
        }
        //Проеверка старого пароля
        if (!Hash::check($data['old_password'], auth()->user()->password)) {
            return back()->with("statusPasswordError", __('messages.status_password_error2'));
        }


        #Обнолвения пароля
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($data['new_password'])
        ]);

        return back()->with("statusPassword", __('messages.password_changed'));
    }
}
