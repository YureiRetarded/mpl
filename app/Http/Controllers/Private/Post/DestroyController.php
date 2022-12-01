<?php

namespace App\Http\Controllers\Private\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
