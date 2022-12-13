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

            if ($project_link !== $this->toEnglishCharacters($data['title'])) {
                if (Project::where('user_id', $user->id)->where('link', $this->toEnglishCharacters($data['title']))->exists()) {
                    throw $error;
                }
            }

            $data['link'] = $this->toEnglishCharacters($data['title']);
            $data['user_id'] = $user->id;
            $tags = [];
            if (isset($data['tags'])) {

                $rawTags = explode(' ', $data['tags']);
                foreach (array_unique($rawTags) as $tag) {
                    $tags[] = Tag::firstOrCreate(['name' => mb_strtolower($tag)]);
                }
            }
            unset($data['tags']);
            $project->update($data);
            $tagsIds = [];
            foreach ($tags as $tag) {
                $tagsIds[] = $tag->id;
            }
            $project->tags()->sync($tagsIds);
            $project->fresh();
            return redirect('/users/' . $project->user->link . '/projects/' . $project->link);
        } else {
            return view('public.error.project404', compact('user'));
        }
    }
}
