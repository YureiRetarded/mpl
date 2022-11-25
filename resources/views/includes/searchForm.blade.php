<div class="mb-3">
    <form class="d-flex" role="search">
        <input class="form-control me-2" name="query" type="search" placeholder="Поиск" aria-label="Search"
               value="{{$_GET['query']??''}}">
        <button class="btn btn-outline-success
        @if(auth()->user()!==null)
            @if(request()->is('projects')||request()->is('news'))
                me-2
            @else
            @if(Request::segment(2) == auth()->user()->name)
               me-2
               @endif
            @endif
        @endif
        " type="submit">Поиск
        </button>
        @if(request()->is('projects') && auth()->user()!==null)
            @include('includes.project.projectIndexToolbar')
        @elseif(request()->is('news') && auth()->user()!==null)
            @include('includes.news.newsIndexToolbar')
        @elseif(auth()->user()!==null && Request::segment(2) == auth()->user()->name)
            @if(Request::segment(3)==='projects')
                @include('includes.project.projectIndexToolbar')
            @elseif(Request::segment(3)==='news')
                @include('includes.news.newsIndexToolbar')
            @endif
        @endif
    </form>
</div>
