<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class UpdateImageController extends Controller
{
    public function __invoke(Request $request)
    {
        //Валидация
        $data = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,|max:10240|dimensions:max_width=2048,max_height=2048,min_width=350,min_height=350',
        ]);

        //Наименование
        $str = Str::random(100). '.webp';

        while (Storage::exists('/public/' . $str)) {
            $str = Str::random(100);
        }

        //Конвертируем и сохраняем
        $image = $request->file('avatar')->get();
        $interventionImage = Image::make($image)->stream("webp", 10);
        Storage::put('/public/' . $str, $interventionImage);





        //Записываем в бд
        //Берём авторизированного пользователя и берём его строку из бд
        $currentUser = auth()->user();
        $user = User::find($currentUser->id);
        if ($user->avatar != '' && Storage::exists('public/' . $user->avatar)) {
            Storage::delete('/public/' . $user->avatar);
        }
        $data['avatar'] = $str;
        $user->update($data);
        return back()->with("avatar", "Avatar установлен");
    }
}
