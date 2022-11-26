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
                       href="{{route('projects')}}">Проекты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('news')) ? 'active' : '' }}"
                       href="{{route('news')}}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('user')) ? 'active' : '' }}" href="{{route('users')}}">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}"
                       href="{{route('aboutProject')}}">О проекте</a>
                </li>
                @can('view',auth()->user())
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('adminpanel')) ? 'active' : '' }}"
                           href="{{route('adminPanel')}}">Админ панель</a>
                    </li>
                @endcan
            </ul>
        </div>
        <div class="collapse navbar-collapse  order-1 dual-collapse1">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('user.project.create',auth()->user()->name)}}">
                                Создать проект
                            </a>
                            <a class="dropdown-item" href="{{route('user.news.create',auth()->user()->name)}}">
                                Создать новость
                            </a>
                            <a class="dropdown-item" href="{{route('user.contact.create',auth()->user()->name)}}">
                                Новый контакт
                            </a>
                            <a class="dropdown-item" href="{{route('user.index',auth()->user()->name)}}">
                                Моя страница
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

