<div class="mb-3">
    <form class="d-flex" role="search">
        <input class="form-control me-2" name="query" type="search" placeholder="Поиск" aria-label="Search"
               value="{{$_GET['query']??''}}">
        <button class="btn btn-outline-success
        @if(auth()->user()!==null)
            @if(request()->is('projects')||request()->is('posts'))
                me-2
            @else
            @if(Request::segment(2) == auth()->user()->login)
               me-2
               @endif
            @endif
        @endif
        " type="submit">{{__('messages.search')}}
        </button>
        @if(request()->is('projects') && auth()->user()!==null)
            @include('includes.project.projectIndexToolbar')
        @elseif(request()->is('posts') && auth()->user()!==null)
            @include('includes.post.postIndexToolbar')
        @elseif(auth()->user()!==null && Request::segment(2) == auth()->user()->login)
            @if(Request::segment(3)==='projects')
                @include('includes.project.projectIndexToolbar')
            @elseif(Request::segment(3)==='posts')
                @include('includes.post.postIndexToolbar')
            @endif
        @endif
    </form>
</div>
