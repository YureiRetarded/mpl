@if(auth()->user()!==null &&  auth()->user()->link===$post->project->user->link)
    <form method="POST"
          action="{{route('user.post.delete',['user'=>auth()->user()->link,'project'=>$post->project->link,'post'=>$post->link])}}">
        @csrf
        @method('delete')
        <a class="btn btn-primary m-1" href="{{url()->current().'/edit'}}" role="button">{{__('messages.edit')}}</a>
        <button class="btn btn-danger m-1 " type="submit">{{__('messages.delete')}}</button>
    </form>
@endif
