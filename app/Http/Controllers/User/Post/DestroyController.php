<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke($username, $project_link, $post_link)
    {
        $user = auth()->user();
        if (count($user->posts->where('link', $post_link)) === 1) {
            $post = $user->posts->where('link', $post_link)->first();
            $post->delete();
            return redirect()->back();
        } else {
            abort(421);
        }
    }
}
