@extends('layouts.user.user')
@section('title','Проекты')
@section('userContent')
    @include('includes.project.projectIndexToolbar')
    @if(count($projects)==0)
        <h3 class="badText">
            У пользователя {{$user->name}} нет проектов
        </h3>
    @else
        @foreach($projects as $project)
            @include('includes.project.card')
        @endforeach
        {{$projects->links()}}
    @endif
@endsection
