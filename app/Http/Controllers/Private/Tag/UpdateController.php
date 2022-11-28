<?php

namespace App\Http\Controllers\Private\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $data = request()->validate([
            'name' => 'string|required|max:1000|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
        ]);
        $tag->update($data);
        return redirect('/adminpanel/tags');
    }
}
