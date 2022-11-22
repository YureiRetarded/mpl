@extends('layouts.public')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{'/user/'.$user->name}}">{{$user->name}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-0 dual-collapse2">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{'/user/'.$user->name.'/news'}}">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{'/user/'.$user->name.'/projects'}}">Проекты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{'/user/'.$user->name.'/contacts'}}">Контакты</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    @yield('userContent')

@endsection
