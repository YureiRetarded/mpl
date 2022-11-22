@extends('layouts.user.user')
@section('title',$user->name)
@section('userContent')
    Имя пользователя {{$user->name}}<br>
    Кол-во новостей {{$user->news->count()}}<br>
    Кол-во проектов {{$user->projects->count()}}<br>
@endsection
