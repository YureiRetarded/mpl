<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'title' => 'string|required|max:255|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
            'description' => 'string',
            'text' => 'string',
            'public_access_level_id' => 'int|required',
            'status_id' => 'int|required',
            'github_link' => 'url|nullable',
            'url' => 'url|nullable'
        ]);
        $error = ValidationException::withMessages([
            'title' => ['У вас уже есть проект с таким название'],
        ]);
        if (Project::where('user_id', $user->id)->where('link', $this->toEnglishCharacters($data['title']))->exists()) {
            throw $error;
        }
        $data['link'] = $this->toEnglishCharacters($data['title']);
        $data['user_id'] = $user->id;
        $project = Project::firstOrCreate($data);;

        return view('public.user.projects.show', compact('project', 'user'));
    }
}
