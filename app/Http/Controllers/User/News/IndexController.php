<?php

namespace App\Http\Controllers\User\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function __invoke($username)
    {

        if (User::where('name', $username)->exists()) {
            $user = User::where('name', $username)->first();
            //К - Костыль
            if (isset($_GET['query']) && $_GET['query'] != '') {
                $newsIds = DB::table('news')
                    ->join('projects', 'news.project_id', '=', 'projects.id')
                    ->join('users', 'projects.user_id', '=', 'users.id')
                    ->where('users.id', '=', $user->id)
                    ->where('news.title', 'like', '%' . $_GET['query'] . '%')
                    ->where('news.deleted_at', '=', null)
                    ->select('news.id')
                    ->get();
                $news = [];
                foreach ($newsIds as $id) {
                    $news[] = News::find($id->id);
                }
                $news = $this->paginate($news, 10, '', ["path" => url()->current()]);
                return view('public.user.news.index', compact('user', 'news'));
            }
            $news = $this->paginate($user->news, 10, '', ["path" => url()->current()]);
            return view('public.user.news.index', compact('user', 'news'));
        } else {
            abort(418);
        }
    }
}
