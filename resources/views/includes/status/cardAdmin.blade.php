<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row">
        <div class="col">
            {{$status->name_ru}} // {{$status->name_en}}
        </div>
        <div class="col">
            <form class="row row-cols-lg-auto g-3 align-items-center" method="post"
                  action="{{route('admin.status.delete',['status'=>$status->id])}}">
                @csrf
                @method('delete')
                <a class="btn btn-primary me-2"
                   href="{{route('admin.status.edit',['status'=>$status->id])}}">
                    {{__('messages.edit')}}
                </a>
                <button type="submit" class="btn btn-danger">
                    {{__('messages.delete')}}
                </button>
            </form>
        </div>
    </div>
</div>
