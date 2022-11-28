<?php

namespace App\Http\Controllers\Private\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'name' => 'string|required|max:1000|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
            'access_level' => 'int|required|',
        ]);
        $error = ValidationException::withMessages([
            'title' => ['У вас уже есть такая роль с таким название'],
        ]);
        if (Role::where('name', $data['name'])->exists()) {
            throw $error;
        }
        Role::create($data);
        return redirect('/adminpanel/roles');
    }
}
