@extends('layouts.user.user')
@section('title','Ошибка')
@section('userContent')
    У проекта {{$project_title}}, пользователя {{$username}} не имеется такой новости
@endsection
