@extends('layouts.user.user')
@section('title','Проекты')
@section('userContent')
    @include('includes.searchForm')
    @if(count($projects)==0 && !isset($_GET['query']))
        <h3 class="badText">Проектов нет</h3>
    @elseif(count($projects)==0 && isset($_GET['query']))
        <h3 class="badText">Проектов с таким названием нет</h3>
    @else
        @foreach($projects as $project)
            @include('includes.project.card')
        @endforeach
        {{$projects->links()}}
    @endif
@endsection
