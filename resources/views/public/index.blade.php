@extends('layouts.public')
@section('title','MyProjectList')
@section('content')
    <div>
        <h1 class="text-center">MyProjectList</h1>
    </div>
    <div>
        <p>{{__('index.p1')}}</p>
        <p>{{__('index.p2')}}</p>
    </div>
    <div class="text-center mt-5">
        <h2>{{__('messages.posts')}}: {{$posts}}</h2>
        <h2>{{__('messages.projects')}}: {{$projects}}</h2>
        <h2>{{__('messages.users')}}: {{$users}}</h2>
    </div>
@endsection
