<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row">
        <div class="col"> {{$user->name}}</div>
        <div class="col"> Проектов: {{$user->projects->count()}}</div>
        <div class="col"> Новостей: {{$user->news->count()}}</div>
        <div class="col">
            <a target="_blank" class="btn btn-primary" href="{{route('admin.user.edit',['user'=>$user->id])}}">Редактировать</a>
            <a target="_blank" class="btn btn-primary" href="{{route('user.index',['user'=>$user->name])}}">Открыть</a>
        </div>
    </div>
</div>
