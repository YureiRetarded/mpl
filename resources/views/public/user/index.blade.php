@extends('layouts.user.user')
@section('title',$user->name)
@section('userContent')
    Имя пользователя {{$user->name}}<br>
    Кол-во новостей {{$user->news->count()}}<br>
    Кол-во проектов {{$user->projects->count()}}<br>
{{--    @foreach($user->project->languages as $item)--}}
{{--        {{$item->name}}<br>--}}
{{--    @endforeach--}}
{{--    Используемые языки {{$user->name}}<br>--}}
{{--    Используемые технологии {{$user->name}}<br>--}}
{{--    Используемые теги {{$user->name}}<br>--}}
@endsection
