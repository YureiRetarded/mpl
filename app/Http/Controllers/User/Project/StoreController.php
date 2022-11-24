<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $data = request()->validate([
            'title' => 'string|required|max:90|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
            'description' => 'string|nullable|max:65535',
            'text' => 'string|nullable|max:4294967000',
            'public_access_level_id' => 'int|required',
            'status_id' => 'int|required',
            'github_link' => 'url|nullable|max:1000',
            'url' => 'url|nullable|max:1000',
            'tags' => 'string|nullable|min:2|max:2000|regex:/^([a-zA-Z0-9а-яА-Я#@]+\s?)*$/ui',
        ]);
        $error = ValidationException::withMessages([
            'title' => ['У вас уже есть проект с таким название'],
        ]);
        if (Project::where('user_id', $user->id)->where('link', $this->toEnglishCharacters($data['title']))->exists()) {
            throw $error;
        }
        $data['link'] = $this->toEnglishCharacters($data['title']);
        $data['user_id'] = $user->id;

        $tags = [];
        if(isset($data['tags'])){

            $rawTags = explode(' ', $data['tags']);
            foreach ($rawTags as $key => $tag) {
                $rawTags[$key] = $this->toEnglishCharacters($tag);
            }
            foreach (array_unique($rawTags) as $tag) {
                $tags[] = Tag::firstOrCreate(['name' => $tag]);
            }
        }
        unset($data['tags']);
        $project = Project::create($data);
        $tagsIds = [];
        foreach ($tags as $tag) {
            $tagsIds[] = $tag->id;
        }
        $project->tags()->sync($tagsIds);
        return redirect('/user/' . $project->user->name . '/projects/' . $project->link);
    }
}
