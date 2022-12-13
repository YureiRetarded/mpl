@if(auth()->user()!==null && auth()->user()->link===$user->link)
    <div class="container-fluid mb-3">
        <a class="btn btn-primary" href="{{route('user.contact.create',['user'=>auth()->user()->link])}}"
           role="button">
            {{__('messages.create_contact')}}
        </a>
    </div>
@endif
