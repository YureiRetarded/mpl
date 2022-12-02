@extends('layouts.user.user')
@section('title',$user->name)
@section('userContent')
    <div class="container-fluid" style="word-wrap: break-word">
        <h1 class="text-center">{{$user->name}}</h1>
        <h5>
            Проектов: {{$user->projects->count()}}
        </h5>
        <h5>
            Постов: {{$user->posts->count()}}
        </h5>
        <div>
            @if(isset($user->about))
                <p>{{$user->about}}</p>
            @else
                <p>{{$user->name}} не написал информации о себе </p>
            @endif
        </div>
    </div>
@endsection
