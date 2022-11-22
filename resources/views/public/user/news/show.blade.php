@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    Имя новости: {{$news->title}}<br>
    Текст новости: {{$news->text}}<br>
@endsection
