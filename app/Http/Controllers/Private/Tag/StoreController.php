<?php

namespace App\Http\Controllers\Private\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'name' => 'string|required|max:1000|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
        ]);
        $rawTags = explode(' ', $data['name']);
        foreach (array_unique($rawTags) as $tag) {
            Tag::firstOrCreate(['name' => mb_strtolower($tag)]);
        }

        return redirect('/adminpanel/tags');
    }
}
