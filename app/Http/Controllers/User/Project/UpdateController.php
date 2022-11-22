<?php

namespace App\Http\Controllers\User\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke($username, $link)
    {
        $user = auth()->user();
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
        if (Project::where('user_id', auth()->user()->id)->where('link', $link)->exists()) {
            $project = auth()->user()->projects->where('link', $link)->first();
            $tags = [];
            foreach (array_unique(explode(' ', $data['tags'])) as $tag) {
                $tags[] = Tag::firstOrCreate(['name' => $tag]);
            }
            unset($data['tags']);
            $data['link'] = $link;
            $tagsIds = [];
            foreach ($tags as $tag) {
                $tagsIds[] = $tag->id;
            }
            $project->update($data);
            $project->tags()->sync($tagsIds);
            return view('public.user.projects.show', compact('project', 'user'));
        } else {
            return view('public.error.project404', compact('user', 'link'));
        }
    }
}
