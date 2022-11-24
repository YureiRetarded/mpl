@extends('layouts.public')
@section('content')
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="{{route('user.index',['user'=>$user->name])}}">{{$user->name}}</a>
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('users/*/news') == 'news') ? 'active' : '' }}"
                       href="{{route('user.news.index',['user'=>$user->name])}}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('users/*/projects') == 'projects') ? 'active' : '' }}"
                       href="{{route('user.project.index',['user'=>$user->name])}}">Проекты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('users/*/contacts') == 'contacts') ? 'active' : '' }}"
                       href="{{route('user.contact.index',['user'=>$user->name])}}">Контакты</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        @yield('userContent')
    </div>
@endsection