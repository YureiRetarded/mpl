<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row">
        <div class="col"> {{$role->name}}</div>
        <div class="col">
            <form class="row row-cols-lg-auto g-3 align-items-center" method="post"
                  action="{{route('admin.role.delete',['role'=>$role->id])}}">
                @csrf
                @method('delete')
                <a class="btn btn-primary me-2"
                   href="{{route('admin.role.edit',['role'=>$role->id])}}">
                    {{__('messages.edit')}}
                </a>
                <button type="submit" class="btn btn-danger">
                    {{__('messages.delete')}}
                </button>
            </form>
        </div>
    </div>
</div>
