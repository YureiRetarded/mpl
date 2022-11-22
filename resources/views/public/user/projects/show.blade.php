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
    <a class="btn btn-primary" href="{{url()->current().'/news'}}" role="button">Просмотреть все новости этого
        проекта</a><br>
    @if(auth()->user()->name===$project->user->name)
        <a class="btn btn-primary" href="{{url()->current().'/edit'}}" role="button">Редактировать</a><br>
        <form method="POST"
              action="{{route('user.project.delete',['user'=>auth()->user()->name,'project'=>$project->link])}}">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">Удались</button>
        </form>
    @endif
@endsection
