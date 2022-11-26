@extends('public.search.projects')
@section('searchContent')
    @foreach($projects as $project)
        @include('includes.project.card')
    @endforeach
    {{$projects->links()}}
@endsection
