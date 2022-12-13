<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row  " onclick="location.href='{{route('user.index',['user'=>$user->link])}}'">
        <div class="col"> {{$user->name}}({{$user->link}})</div>
        <div class="col"> {{__('messages.projects')}}: {{$user->projects->count()}}</div>
        <div class="col"> {{__('messages.posts')}}: {{$user->posts->count()}}</div>
    </div>
</div>
