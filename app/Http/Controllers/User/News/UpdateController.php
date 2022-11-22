<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Project;
use Illuminate\Validation\ValidationException;

class UpdateController extends Controller
{
    public function __invoke($username, $link)
    {
        $user = auth()->user();
        $data = request()->validate([
            'title' => 'string|required|max:255|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
            'text' => 'string',
            'project_id' => 'int|required',
        ]);
        $error = ValidationException::withMessages([
            'title' => ['У вас уже есть новость с таким название'],
        ]);
        if (Project::where('user_id', $user->id)->where('id', $data['project_id'])->exists() && News::where('project_id', $data['project_id'])->where('link', $this->toEnglishCharacters($data['title']))->exists()) {
            throw $error;
        }
        $data['link'] = $this->toEnglishCharacters($data['title']);
        $news = News::where('project_id', $data['project_id'])->where('link', $this->toEnglishCharacters($data['title']))->first();
        $news->update($data);
        return view('public.user.news.show', compact('news', 'user'));

    }
}
