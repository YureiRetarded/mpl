@if(auth()->user()!==null && auth()->user()->login===$project->user->login)
    <form method="POST"
          action="{{route('user.project.delete',['user'=>auth()->user()->login,'project'=>$project->link])}}">
        @csrf
        @method('delete')
        <a class="btn btn-primary m-1" href="{{url()->current().'/edit'}}" role="button">Редактировать</a>
        <button class="btn btn-danger m-1" type="submit">Удались</button>
    </form>
@endif
