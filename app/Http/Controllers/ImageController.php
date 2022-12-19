<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function get($name){
        return view('index');
        return Storage::get('/images/no_image.png');
    }
}
