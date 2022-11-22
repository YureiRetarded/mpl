@extends('layouts.public')
@section('title','Пользователи')
@section('content')
    Пользователи
    @foreach($users as $user)
        <div role="button" class="card mb-4" onclick="location.href='{{'/user/'.$user->name}}'">
            <div class="card-header">
                {{$user->name}}
            </div>
        </div>
    @endforeach
    {{$users->links()}}
@endsection
