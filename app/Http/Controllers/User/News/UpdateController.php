<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Validation\ValidationException;

class UpdateController extends Controller
{
    public function __invoke($username, $project_link, $news_link)
    {
        $user = auth()->user();
        if (count($user->projects->where('link', $project_link)) === 1) {
            $project = $user->projects->where('link', $project_link)->first();
            if (count($project->news->where('link', $news_link)) === 1) {
                $news = $project->news()->where('link', $news_link)->first();
                $data = request()->validate([
                    'title' => 'string|required|max:1000|min:2|regex:/^([a-zA-Z0-9а-яА-Я]+\s?)*$/ui',
                    'text' => 'string|required|max:4294967000',
                    'project_id' => 'int|required',
                ]);
                $error = ValidationException::withMessages([
                    'title' => ['У этого проекта уже есть новсть с таким названием'],
                ]);

                if ($news->link !== $this->toEnglishCharacters($data['title']) && $news->project_id !== (int)$data['project_id']) {
                    //поменялось имя и проект
                    if (count($project->news->where('link', $this->toEnglishCharacters($data['title']))) === 1 || count(Project::where('id', $data['project_id'])->first()->news->where('link', $this->toEnglishCharacters($data['title']))) === 1) {
                        throw $error;
                    }
                } elseif ($news->link !== $this->toEnglishCharacters($data['title']) && $news->project_id === (int)$data['project_id']) {
                    //поменялось имя
                    if (count($project->news->where('link', $this->toEnglishCharacters($data['title']))) === 1) {
                        throw $error;
                    }
                } elseif ($news->link === $this->toEnglishCharacters($data['title']) && $news->project_id !== (int)$data['project_id']) {
                    // поменялся проект
                    if (count(Project::where('id', $data['project_id'])->first()->news->where('link', $this->toEnglishCharacters($data['title']))) === 1) {
                        throw $error;
                    }
                }
                $data['link'] = $this->toEnglishCharacters($data['title']);
                $news->update($data);
                $news->fresh();
                return redirect('/user/' . $project->user->name . '/projects/' . $news->project->link . '/news/' . $news->link);
            } else {
                abort(421);
            }
        } else {
            abort(420);
        }
    }
}
