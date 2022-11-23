@extends('layouts.public')
@section('title','Пользователи')
@section('content')
    <div class="container-fluid text-center"><h1>Список пользователей</h1></div>
    <div class="container-fluid">
        @foreach($users as $user)
            <div class="container text-center card mb-3 p-1 ">
                <div role="button" class="row  " onclick="location.href='{{'/user/'.$user->name}}'">
                    <div class="col"> {{$user->name}}</div>
                    <div class="col"> Проектов: {{$user->projects->count()}}</div>
                    <div class="col"> Новостей: {{$user->news->count()}}</div>
                </div>
            </div>
        @endforeach
        {{$users->links()}}
    </div>
@endsection
