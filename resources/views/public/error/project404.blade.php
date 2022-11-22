@extends('layouts.user.user')
@section('title','Ошибка')
@section('userContent')
    У пользователя {{$user->name}}, нет такого проекта
@endsection
