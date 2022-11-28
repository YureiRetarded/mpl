<?php

namespace App\Http\Controllers\Private\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class DestroyController extends Controller
{
    public function __invoke(News $news)
    {
        $news->delete();
        return redirect()->back();
    }
}
