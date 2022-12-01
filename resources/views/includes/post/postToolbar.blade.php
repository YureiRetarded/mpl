@if(auth()->user()!==null &&  auth()->user()->name===$post->project->user->name)
    <form method="POST"
          action="{{route('user.post.delete',['user'=>auth()->user()->name,'project'=>$post->project->link,'post'=>$post->link])}}">
        @csrf
        @method('delete')
        <a class="btn btn-primary m-1" href="{{url()->current().'/edit'}}" role="button">Изменить</a>
        <button class="btn btn-danger m-1 " type="submit">Удались</button>
    </form>
@endif