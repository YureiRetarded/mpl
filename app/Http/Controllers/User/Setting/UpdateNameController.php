<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;

class UpdateNameController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'name' => 'required|string|max:255|min:3|regex:/^[a-zA-Z0-9_]+$/ui|unique:users',
        ]);
        $user->update($data);
        return back()->with("statusName", "Имя изменёно");
    }
}
