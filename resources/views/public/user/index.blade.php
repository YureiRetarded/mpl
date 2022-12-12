@extends('layouts.user.user')
@section('title',$user->name)
@section('userContent')
    <div class="container-fluid" style="word-wrap: break-word">
        <h1 class="text-center">{{$user->name}}</h1>
        <h5>
            {{__('messages.projects')}}: {{$user->projects->count()}}
        </h5>
        <h5>
            {{__('messages.posts')}}: {{$user->posts->count()}}
        </h5>
        <div>
            @if(isset($user->about))
                <p>{{$user->about}}</p>
            @else
                <p>{{$user->name}} {{__('messages.project_no_about')}}</p>
            @endif
        </div>
    </div>
@endsection
