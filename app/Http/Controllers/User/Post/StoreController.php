<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'title' => 'string|required|max:1000|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
            'text' => 'string|required|max:4294967000',
            'project_id' => 'int|required',
        ]);
        $error = ValidationException::withMessages([
            'title' => ['У вас уже есть пост с таким название'],
        ]);
        if (Project::where('user_id', $user->id)->where('id', $data['project_id'])->exists() && Post::where('project_id', $data['project_id'])->where('link', $this->toEnglishCharacters($data['title']))->exists()) {
            throw $error;
        }
        $data['link'] = $this->toEnglishCharacters($data['title']);
        $post = Post::firstOrCreate($data);
        return redirect('/users/' . $user->link . '/projects/' . $post->project->link . '/posts/' . $post->link);
    }
}
