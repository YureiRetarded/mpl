<?php

namespace App\Http\Controllers\Private\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'name' => 'string|required|max:1000|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
        ]);
        $error = ValidationException::withMessages([
            'title' => ['У вас уже есть статус с таким название'],
        ]);
        if (Status::where('name', $data['name'])->exists()) {
            throw $error;
        }
        Status::create($data);
        return redirect('/adminpanel/statuses');
    }
}
