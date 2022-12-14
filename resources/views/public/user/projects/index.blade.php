@extends('layouts.user.user')
@section('title',__('messages.navigate_projects'))
@section('userContent')
    @if(isset($banStatus)&&$banStatus===true)
        @include('includes.user.userBan')
    @else
        @include('includes.searchForm')
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
    @endif
@endsection
