<div role="button" class="card mb-4">
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
        <footer>
            <form class="row row-cols-lg-auto g-3 align-items-center" method="post"
                  action="{{route('admin.project.delete',['project'=>$project->id])}}">
                @csrf
                @method('delete')
                <a class="no-underline" target="_blank" href="{{route('user.index',['user'=>$project->user->link])}}">
                    {{__('messages.author')}}: {{mb_strimwidth($project->user->name,0,50,'...')}}
                </a>
                <a target="_blank" class="btn btn-primary me-2"
                   href="{{route('user.project.show',['user'=>$project->user->link,'project'=>$project->link])}}">
                    {{__('messages.open')}}
                </a>
                <button type="submit" class="btn btn-danger">
                    {{__('messages.delete')}}
                </button>
            </form>
        </footer>
    </div>
</div>
