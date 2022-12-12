@if(auth()->user()!==null && auth()->user()->login===$project->user->login)
    <form method="POST"
          action="{{route('user.project.delete',['user'=>auth()->user()->login,'project'=>$project->link])}}">
        @csrf
        @method('delete')
        <a class="btn btn-primary m-1" href="{{url()->current().'/edit'}}" role="button">{{__('messages.edit')}}</a>
        <button class="btn btn-danger m-1" type="submit">{{__('messages.delete')}}</button>
    </form>
@endif
