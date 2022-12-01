<div role="button" class="card mb-4"
    onclick="location.href='{{route('user.post.show',['user'=>$post->project->user->name,'project'=>$post->project->link,'post'=>$post->link])}}'">
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
            <a href="{{route('user.project.show',['user'=>$post->project->user->name,'project'=>$post->project->link])}}">
                {{mb_strimwidth($post->project->title,0,50,'...')}}
            </a>
        </div>
        @if(auth()->user()!==null && auth()->user()->name===$post->project->user->name)
            <form method="POST"
                  action="{{route('user.post.delete',['user'=>auth()->user()->name,'project'=>$post->project->link,'post'=>$post->link])}}">
                @csrf
                @method('delete')
                <a class="btn btn-primary"
                   href="{{'/users/'.auth()->user()->name.'/projects/'.$post->project->link.'/posts/'.$post->link.'/edit'}}"
                   role="button">Изменить</a>
                <button class="btn btn-danger" type="submit">Удались</button>
            </form>
        @endif

    </div>
</div>
