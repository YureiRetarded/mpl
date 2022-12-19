<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    public function index(){
        return view('index');
    }
    public function show($id)
    {
        $image=Storage::get('/images/'.$id.'.png');
        dd($image);
        //return view('show',compact('image'));
    }

    public function store(Request $request)
    {
        //Валидация фото
        $request->validate([
            'photo' => '',
        ]);
        //Случайное имя
        $str=Str::random(240);

        //Создаём временный конвертируемый файл
        Storage::put('/images/'.$str.'.webp', Image::make($request->file('photo')->get())->stream("webp", 25), 'public');
        $file=Storage::get('/images/'.$str.'.webp');

        //Грузим файл на сервер
        Storage::disk('ftp')->put('/'.$str.'.webp' ,$file);

        //Удаляем конвертированный файл
        Storage::delete('/images/'.$str.'.webp');

        return redirect()->to('/images/'.$str);
    }
}
