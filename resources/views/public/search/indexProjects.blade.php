@extends('public.search.projects')
@section('title','Проекты')
@section('searchContent')
    @foreach($projects as $project)
        @include('includes.project.card')
    @endforeach
    {{$projects->links()}}
@endsection
