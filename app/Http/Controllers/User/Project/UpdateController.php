<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Validation\ValidationException;

class UpdateController extends Controller
{
    public function __invoke($username, $project_link)
    {
        $user = auth()->user();
        if (count($user->projects->where('link', $project_link)) === 1) {
            $project = $user->projects->where('link', $project_link)->first();
            $data = request()->validate([
                'title' => 'string|required|max:255|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
                'description' => 'string',
                'text' => 'string',
                'public_access_level_id' => 'int|required',
                'status_id' => 'int|required',
                'github_link' => 'url|nullable',
                'url' => 'url|nullable',
                'tags' => 'string|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
            ]);
            $error = ValidationException::withMessages([
                'title' => ['У вас уже есть проект с таким название'],
            ]);

            if ($project_link !== $this->toEnglishCharacters($data['title'])) {
                if (Project::where('user_id', $user->id)->where('link', $this->toEnglishCharacters($data['title']))->exists()) {
                    throw $error;
                }
            }

            $data['link'] = $this->toEnglishCharacters($data['title']);
            $data['user_id'] = $user->id;
            $tags = [];
            foreach (array_unique(explode(' ', $data['tags'])) as $tag) {
                $tags[] = Tag::firstOrCreate(['name' => $tag]);
            }
            unset($data['tags']);
            $tagsIds = [];
            foreach ($tags as $tag) {
                $tagsIds[] = $tag->id;
            }
            $project->update($data);
            $project->tags()->sync($tagsIds);
            $project->fresh();
            return redirect('/user/' . $project->user->name . '/projects/' . $project->link);
        } else {
            return view('public.error.project404', compact('user'));
        }
    }
}
