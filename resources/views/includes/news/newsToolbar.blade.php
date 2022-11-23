@if(auth()->user()!==null &&  auth()->user()->name===$news->project->user->name)
    <form method="POST"
          action="{{route('user.news.delete',['user'=>auth()->user()->name,'project'=>$news->project->link,'news'=>$news->link])}}">
        @csrf
        @method('delete')
        <a class="btn btn-primary m-1" href="{{url()->current().'/edit'}}" role="button">Изменить</a>
        <button class="btn btn-danger m-1 " type="submit">Удались</button>
    </form>
@endif
