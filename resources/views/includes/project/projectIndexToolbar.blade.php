@if(auth()->user()!==null && auth()->user()->name===$user->name)
    <div class="container-fluid mb-3">
        <a class="btn btn-primary" href="{{route('user.project.create',['user'=>auth()->user()->name])}}" role="button">
            Создать новый проект
        </a>
    </div>
@endif
