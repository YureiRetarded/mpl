@extends('layouts.user.user')
@section('title','Ошибка')
@section('userContent')
    <div class="container-fluid">

    </div>
    У проекта {{$project_title}}, пользователя {{$username}} не имеется такой новости
@endsection
