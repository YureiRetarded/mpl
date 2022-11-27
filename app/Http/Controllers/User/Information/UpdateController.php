<?php

namespace App\Http\Controllers\User\Information;

use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'about' => 'string|max:10000',
        ]);
        $user->update($data);
        return redirect('/users/' .$user->name);
    }
}
