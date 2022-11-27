@extends('layouts.user.user')
@section('title','Проекты')
@section('userContent')
    @include('includes.searchForm')
    @if(count($projects)==0)
        @if(auth()->user()!==null && auth()->user()->name===Request::segment(2))
            <h3 class="badText">
                У Вас нет проектов
            </h3>
        @else
            <h3 class="badText">
                У пользователя {{$user->name}} нет проектов
            </h3>
        @endif
    @else
        @foreach($projects as $project)
            @include('includes.project.card')
        @endforeach
        {{$projects->links()}}
    @endif
@endsection
