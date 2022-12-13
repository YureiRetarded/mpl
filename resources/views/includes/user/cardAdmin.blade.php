<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row">
        <div class="col"> {{$user->name}}</div>
        <div class="col"> {{__('messages.projects')}}: {{$user->projects->count()}}</div>
        <div class="col"> {{__('messages.posts')}}: {{$user->posts->count()}}</div>
        <div class="col"> {{__('messages.role')}}: {{$user->role->name}}</div>
        <div class="col">
            <a class="btn btn-primary"
               href="{{route('admin.user.edit',['user'=>$user->id])}}">{{__('messages.edit')}}</a>
            <a target="_blank" class="btn btn-primary"
               href="{{route('user.index',['user'=>$user->link])}}">{{__('messages.open')}}</a>
        </div>
    </div>
</div>
