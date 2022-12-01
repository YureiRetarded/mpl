<div role="button" class="card mb-4">
    <div class="card-body">
        <div class="card-text ">
            <h3>
                {{mb_strimwidth($post->title,0,50,'...')}}
            </h3>
        </div>
        <div class="card-text">
            <h5>{{mb_strimwidth($post->text,0,150,'...')}}</h5>
        </div>
        <div class="card-text mb-2">
            <a target="_blank" href="{{route('user.project.show',['user'=>$post->project->user->name,'project'=>$post->project->link])}}">
                {{mb_strimwidth($post->project->title,0,50,'...')}}
            </a>
        </div>
        <div class="card-text mb-2">
            <a target="_blank" href="{{route('user.index',['user'=>$post->project->user->name])}}">
                {{mb_strimwidth($post->project->user->name,0,50,'...')}}
            </a>
        </div>
        <div>
            <form class="row row-cols-lg-auto g-3 align-items-center" method="post"
                  action="{{route('admin.post.delete',['post'=>$post->id])}}">
                @csrf
                @method('delete')
                <a target="_blank"
                   class="btn btn-primary  me-2"
                   href="{{route('user.post.show',['user'=>$post->project->user->name,'project'=>$post->project->link,'post'=>$post->link])}}">
                    Открыть
                </a>
                <button type="submit" class="btn btn-danger">
                    Удалить
                </button>
            </form>
        </div>
    </div>
</div>
