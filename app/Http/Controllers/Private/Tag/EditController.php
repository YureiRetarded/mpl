<?php

namespace App\Http\Controllers\Private\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('private.tags.edit',compact('tag'));
    }
}
