<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row  " onclick="location.href='{{route('user.index',['user'=>$user->login])}}'">
        <div class="col"> {{$user->name}}({{$user->login}})</div>
        <div class="col"> {{__('messages.projects')}}: {{$user->projects->count()}}</div>
        <div class="col"> {{__('messages.posts')}}: {{$user->posts->count()}}</div>
    </div>
</div>
