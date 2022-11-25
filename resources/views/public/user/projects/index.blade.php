@extends('layouts.user.user')
@section('title','Проекты')
@section('userContent')
    @if(count($projects)==0)
        <h3 class="badText">
            У пользователя {{$user->name}} нет проектов
        </h3>
    @else
        @include('includes.searchForm')
        @foreach($projects as $project)
            @include('includes.project.card')
        @endforeach
        {{$projects->links()}}
    @endif
@endsection
