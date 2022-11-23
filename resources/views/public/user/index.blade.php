@extends('layouts.user.user')
@section('title',$user->name)
@section('userContent')
    <div class="container-fluid" style="word-wrap: break-word">
        <h1 class="text-center">{{$user->name}}</h1>
        <h5>
            Проектов: {{$user->projects->count()}}
        </h5>
        <h5>
            Новостей: {{$user->news->count()}}
        </h5>
        @if(isset($user->about))

        @endif
    </div>
@endsection
