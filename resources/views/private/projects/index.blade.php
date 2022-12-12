@extends('layouts.private')
@section('title',__('messages.navigate_projects'))
@section('content')
    @include('includes.searchForm')
    @foreach($projects as $project)
        @include('includes.project.cardAdmin')
    @endforeach
    <div>
        {{$projects->links()}}
    </div>
@endsection
