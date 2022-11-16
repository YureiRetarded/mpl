@extends('layouts.public')
@section('title',$news->title)
@section('content')
    Новость конкретная
    Имя новости: {{$news->title}}<br>
    Текст новости: {{$news->text}}<br>
    <a href="{{route('project.show',$news->project->id)}}">Проект</a><br>
@endsection
