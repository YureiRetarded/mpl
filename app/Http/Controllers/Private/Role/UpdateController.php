<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;

class UpdateController extends Controller
{
    public function __invoke(Role $role)
    {

        $data = request()->validate([
            'name' => 'string|required|max:1000|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
            'access_level' => 'int|required|',
        ]);
        $role->update($data);
        return redirect('/adminpanel/roles');
    }
}
