@extends('layouts.public')
@section('content')
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="{{route('user.index',['user'=>$user->link])}}">{{$user->name}}</a>
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('users/*/posts') == 'posts') ? 'active' : '' }}"
                       href="{{route('user.posts.index',['user'=>$user->link])}}">{{__('messages.navigate_posts')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('users/*/projects') == 'projects') ? 'active' : '' }}"
                       href="{{route('user.project.index',['user'=>$user->link])}}">{{__('messages.navigate_projects')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('users/*/contacts') == 'contacts') ? 'active' : '' }}"
                       href="{{route('user.contact.index',['user'=>$user->link])}}">{{__('messages.navigate_contacts')}}</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class="">
        @yield('userContent')
    </div>
@endsection
