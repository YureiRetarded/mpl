@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    Имя новости: {{$news->title}}<br>
    Текст новости: {{$news->text}}<br>
    Используемые технологии в проекте:<br>
    <ul>
        @foreach($news->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
    </ul>
@endsection
