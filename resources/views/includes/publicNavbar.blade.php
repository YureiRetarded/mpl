<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">MyProjectList</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".dual-collapse1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-0 dual-collapse1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('projects')) ? 'active' : '' }}"
                       href="{{route('projects')}}">{{__('messages.navigate_projects')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('posts')) ? 'active' : '' }}"
                       href="{{route('posts')}}">{{__('messages.navigate_posts')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('user')) ? 'active' : '' }}"
                       href="{{route('users')}}">{{__('messages.navigate_users')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}"
                       href="{{route('aboutProject')}}">{{__('messages.about')}}</a>
                </li>
                @can('view',auth()->user())
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('adminpanel')) ? 'active' : '' }}"
                           href="{{route('adminPanel')}}">{{__('messages.navigate_adminpanel')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('telescope')) ? 'active' : '' }}"
                           href="{{'/telescope'}}" target="_blank">{{__('messages.navigate_telescope')}}</a>
                    </li>
                @endcan
            </ul>
        </div>
        <div class="collapse navbar-collapse order-1 dual-collapse1">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{__('messages.sign_in')}}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{__('messages.sign_up')}}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('user.project.create',auth()->user()->link)}}">
                                {{__('messages.create_project')}}
                            </a>
                            <a class="dropdown-item" href="{{route('user.post.create',auth()->user()->link)}}">
                                {{__('messages.create_post')}}
                            </a>
                            <a class="dropdown-item" href="{{route('user.contact.create',auth()->user()->link)}}">
                                {{__('messages.create_contact')}}
                            </a>
                            <a class="dropdown-item" href="{{route('user.index',auth()->user()->link)}}">
                                {{__('messages.my_page')}}
                            </a>
                            <a class="dropdown-item" href="{{route('user.setting')}}">
                                {{__('messages.setting')}}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{__('messages.log_out')}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="collapse  navbar-collapse order-2 dual-collapse1 flex-grow-0">
            <ul class="navbar-nav ms-auto ">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Config::get('languages')[App::getLocale()] }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @foreach (Config::get('languages') as $lang => $language)
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                    @endforeach
                </div>
            </ul>
        </div>
    </div>
</nav>

