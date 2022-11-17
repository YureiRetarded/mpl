@extends('layouts.user.user')
@section('title','Ошибка')
@section('userContent')
    У пользователя {{$user->name}}, не имеется такой новости
@endsection
