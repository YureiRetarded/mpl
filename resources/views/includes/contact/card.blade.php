<div class="card p-2 text-center mb-2">
    <div class="card-text badText">
        <h5>
            {{$contact->name}}
        </h5>
    </div>
    <div class="card-text badText">
        @if(filter_var($contact->value,FILTER_VALIDATE_URL))
            <a class="btn btn-primary" role="button" target="_blank"
               href="{{$contact->value}}">{{__('messages.contact')}}</a>
        @else
            <h5>
                {{$contact->value}}
            </h5>
        @endif
    </div>
    @if(auth()->user()!==null &&  auth()->user()->login===$user->login)
        <div class="card-text">
            <h5>
                <form method="POST"
                      action="{{route('user.contact.delete',['user'=>auth()->user()->name,'contact'=>$contact->id])}}">
                    <a class="btn btn-primary"
                       href="{{route('user.contact.edit',['user'=>auth()->user()->name,'contact'=>$contact->id])}}"
                       role="button">{{__('messages.edit')}}</a>
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" type="submit">{{__('messages.delete')}}</button>
                </form>
            </h5>
        </div>
    @endif
</div>
