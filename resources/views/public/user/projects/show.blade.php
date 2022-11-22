@extends('layouts.user.user')
@section('title',$project->title)
@section('userContent')
    Имя проекта: {{$project->title}}<br>
    Текст проекта: {{$project->text}}<br>
    Статус проекта: {{$project->status->name}}<br>
    Уровень открытости проекта: {{$project->publicAccessLevel->name}}<br>
    Используемые теги в проекте:<br>
    <ul>
        @foreach($project->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
    </ul>
@endsection
