@extends('public.search.projects')
@section('title',__('messages.navigate_projects'))
@section('searchContent')
    @if(count($projects)==0 && !isset($_GET['query']))
        <h3 class="badText">{{__('messages.no_projects')}}</h3>
    @elseif(count($projects)==0 && isset($_GET['query']))
        <h3 class="badText">{{__('messages.no_projects_name')}}</h3>
    @else
        @foreach($projects as $project)
            @include('includes.project.card')
        @endforeach
        {{$projects->links()}}
    @endif
@endsection
