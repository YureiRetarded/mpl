<div role="button" class="card mb-4"
     onclick="location.href='{{'/user/'.$project->user->name.'/projects/'.$project->link}}'">
    <div class="card-body">
        <div class="card-text ">
            <h3>
                {{mb_strimwidth($project->title,0,50,'...')}}
            </h3>
        </div>
        @if(isset($project->description))
            <div class="card-text">
                <h5>{{mb_strimwidth($project->description,0,255,'...')}}</h5>
            </div>
        @endif
        @if($project->tags->count()>0)
            <blockquote class="blockquote">
                <footer class="blockquote-footer m-2">
                    {{\App\Models\Project::getTagsString($project->tags)}}
                </footer>
            </blockquote>
        @endif
        @if(auth()->user()!==null && auth()->user()->name===$project->user->name)
            <form method="POST"
                  action="{{route('user.project.delete',['user'=>auth()->user()->name,'project'=>$project->link])}}">
                <a class="btn btn-primary" href="{{url()->current().'/'.$project->link.'/edit'}}"
                   role="button">Изменить</a>
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Удались</button>
            </form>
        @endif
    </div>
</div>
