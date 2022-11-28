<div class="container text-center card mb-3 p-1 ">
    <div role="button" class="row">
        <div class="col"> {{$tag->name}}</div>
        <div class="col">
            <form class="row row-cols-lg-auto g-3 align-items-center" method="post"
                  action="{{route('admin.tag.delete',['tag'=>$tag->id])}}">
                @csrf
                @method('delete')
                <a class="btn btn-primary me-2"
                   href="{{route('admin.tag.edit',['tag'=>$tag->id])}}">
                    Редактировать
                </a>
                <button type="submit" class="btn btn-danger">
                    Удалить
                </button>
            </form>
        </div>
    </div>
</div>
