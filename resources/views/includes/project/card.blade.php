<div role="button" class="card mb-4"
     onclick="location.href='{{route('user.project.show',['user'=>$project->user->login,'project'=>$project->link])}}'">
    <div class="card-body">
        <div class="card-text ">
            <h3>
                {{mb_strimwidth($project->title,0,50,'...')}}
            </h3>
        </div>
        <div class="card-text">
            <h5>
                @if(isset($project->description))
                    {{mb_strimwidth($project->description,0,255,'...')}}
                @else
                    {{__('messages.no_project_description')}}
                @endif
            </h5>
        </div>
        <blockquote class="blockquote">
            <footer class="blockquote-footer m-2">
                @if($project->tags->count()>0)
                    {{\App\Models\Project::getTagsString($project->tags)}}
                @else
                    {{__('messages.no_tags')}}
                @endif
            </footer>
        </blockquote>
        @if(Request::segment(1)!=='users')
            <footer>
                <a class="no-underline" href="{{route('user.index',['user'=>$project->user->login])}}">
                    {{__('messages.author')}}: {{mb_strimwidth($project->user->name,0,50,'...')}}
                </a>
            </footer>
        @endif
        @if(auth()->user()!==null && auth()->user()->login===$project->user->login && Request::segment(1)=='users')
            <form method="POST"
                  action="{{route('user.project.delete',['user'=>auth()->user()->login,'project'=>$project->link])}}">
                <a class="btn btn-primary" href="{{url()->current().'/'.$project->link.'/edit'}}"
                   role="button">{{__('messages.edit')}}</a>
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">{{__('messages.delete')}}</button>
            </form>
        @endif
    </div>
</div>
