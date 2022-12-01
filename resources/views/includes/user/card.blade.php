<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row  " onclick="location.href='{{route('user.index',['user'=>$user->name])}}'">
        <div class="col"> {{$user->name}}</div>
        <div class="col"> Проектов: {{$user->projects->count()}}</div>
        <div class="col"> Постов: {{$user->posts->count()}}</div>
    </div>
</div>
