<?php

namespace App\Http\Controllers\Private\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(User $user)
    {

        $data = request()->validate([
            'role_id' => 'int|required',
            'isBan' => 'boolean|required'
        ]);
        $user->update($data);
        return redirect('/adminpanel/users');
    }
}
