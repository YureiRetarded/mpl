<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectsPageController extends Controller
{
    public function __invoke()
    {
        if (isset($_GET['query']) && $_GET['query'] != '') {
            $projectIds = DB::table('projects')
                ->join('users', 'projects.user_id', '=', 'users.id')
                ->where('users.isBan', '=', 0)
                ->orWhere(function ($query) {
                    $query
                        ->where('title', 'like', '%' . $_GET['query'] . '%')
                        ->whereHas('tags', function ($query) {
                            $rawTags = explode(' ', $_GET['query']);
                            $query->whereIn('name', $rawTags);
                        });
                })
                ->orderBy('created_at', 'desc')
                ->select('projects.id')
                ->get();
            $projects = [];
            foreach ($projectIds as $id) {
                $projects[] = Project::find($id->id);
            }
            $projects = $this->paginate($projects, 10, '', ["path" => url()->current()]);
            return view('public.search.indexProjects', compact('projects'));
        }
        //Поиск без названия
        $projectIds = DB::table('projects')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->where('users.isBan', '=', 0)
            ->orderBy('projects.created_at', 'desc')
            ->select('projects.id')
            ->get();
        $projects = [];
        foreach ($projectIds as $id) {
            $projects[] = Project::find($id->id);
        }
        $projects = $this->paginate($projects, 10, '', ["path" => url()->current()]);
        return view('public.search.indexProjects', compact('projects'));
    }
}
