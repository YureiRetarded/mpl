<div role="button" class="card mb-4"
     onclick="location.href='{{route('user.post.show',['user'=>$post->project->user->link,'project'=>$post->project->link,'post'=>$post->link])}}'">
    <div class="card-body">
        <div class="card-text ">
            <h3>
                {{mb_strimwidth($post->title,0,50,'...')}}
            </h3>
        </div>
        <div class="card-text mb-2">
            <a class="no-underline"
               href="{{route('user.project.show',['user'=>$post->project->user->link,'project'=>$post->project->link])}}">
                {{__('messages.project')}}: {{mb_strimwidth($post->project->title,0,50,'...')}}
            </a>
        </div>
        <div class="card-text mb-2">
            <a class="no-underline" target="_blank"
               href="{{route('user.index',['user'=>$post->project->user->link])}}">
                {{__('messages.author')}}: {{mb_strimwidth($post->project->user->name,0,50,'...')}}
            </a>
        </div>
        @if(Request::segment(1)!=='posts'&& auth()->user()!==null && auth()->user()->link===$post->project->user->link)
            <form method="POST"
                  action="{{route('user.post.delete',['user'=>auth()->user()->link,'project'=>$post->project->link,'post'=>$post->link])}}">
                @csrf
                @method('delete')
                <a class="btn btn-primary"
                   href="{{'/users/'.auth()->user()->link.'/projects/'.$post->project->link.'/posts/'.$post->link.'/edit'}}"
                   role="button">{{__('messages.edit')}}</a>
                <button class="btn btn-danger" type="submit">{{__('messages.delete')}}</button>
            </form>
        @endif
    </div>
</div>
