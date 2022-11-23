<div role="button" class="card mb-4"
     onclick="location.href='{{'/user/'.$newsCard->project->user->name.'/projects/'.$newsCard->project->link.'/news/'.$newsCard->link}}'">
    <div class="card-body">
        <div class="card-text ">
            <h3>
                {{mb_strimwidth($newsCard->title,0,50,'...')}}
            </h3>
        </div>
        <div class="card-text">
            <h5>{{mb_strimwidth($newsCard->text,0,150,'...')}}</h5>
        </div>
        <div class="card-text mb-2">
            <a href="{{route('user.project.show',['user'=>$newsCard->project->user->name,'project'=>$newsCard->project->link])}}">
                {{mb_strimwidth($newsCard->project->title,0,50,'...')}}
            </a>
        </div>
        @if(auth()->user()!==null && auth()->user()->name===$newsCard->project->user->name)
            <form method="POST"
                  action="{{route('user.news.delete',['user'=>auth()->user()->name,'project'=>$newsCard->project->link,'news'=>$newsCard->link])}}">
                @csrf
                @method('delete')
                <a class="btn btn-primary"
                   href="{{'/user/'.auth()->user()->name.'/projects/'.$newsCard->project->link.'/news/'.$newsCard->link.'/edit'}}"
                   role="button">Изменить</a>
                <button class="btn btn-danger" type="submit">Удались</button>
            </form>
        @endif

    </div>
</div>
