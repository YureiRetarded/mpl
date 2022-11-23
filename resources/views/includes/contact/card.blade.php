<div class="card p-2 text-center">
    <div class="card-text badText">
        <h5>
            {{$contact->name}}
        </h5>
    </div>
    <div class="card-text badText">
        <h5>
            {{$contact->value}}
        </h5>
    </div>
    @if(auth()->user()!==null &&  auth()->user()->name===$user->name)
        <div class="card-text">
            <h5>
                <form method="POST"
                      action="{{route('user.contact.delete',['user'=>auth()->user()->name,'contact'=>$contact->id])}}">
                    <a class="btn btn-primary"
                       href="{{route('user.contact.edit',['user'=>auth()->user()->name,'contact'=>$contact->id])}}"
                       role="button">Изменить</a>
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </h5>
        </div>
    @endif
</div>
