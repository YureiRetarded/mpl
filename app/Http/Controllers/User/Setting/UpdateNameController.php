<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;

class UpdateNameController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'name' => 'required|string|max:50|min:3|regex:/^[a-zA-Zа-яА-Я0-9_ ]+$/ui',
        ]);
        $user->update($data);
        return back()->with("statusName", "Имя изменено");
    }
}
