@if(auth()->user()!==null && auth()->user()->login===$user->login)
    <div class="container-fluid mb-3">
        <a class="btn btn-primary" href="{{route('user.contact.create',['user'=>auth()->user()->login])}}"
           role="button">
            {{__('messages.create_contact')}}
        </a>
    </div>
@endif
