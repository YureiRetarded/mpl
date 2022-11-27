<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateAboutController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'about' => 'string|max:10000',
        ]);

        $user->update($data);
        return back()->with("statusAbout", "Описание изменено");
    }
}
