<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row  " onclick="location.href='{{route('user.index',['user'=>$user->login])}}'">
        <div class="col"> {{$user->name}}({{$user->login}})</div>
        <div class="col"> Проектов: {{$user->projects->count()}}</div>
        <div class="col"> Постов: {{$user->posts->count()}}</div>
    </div>
</div>
