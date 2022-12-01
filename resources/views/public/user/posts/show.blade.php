@extends('layouts.user.user')
@section('title',$post->title)
@section('userContent')
    @include('includes.post.postToolbar')
    <h1 class="badText">{{$post->title}}</h1>
    <h5>
        Проект: <a class="badText"
                   href="{{route('user.project.show',['user'=>$post->project->user->name,'project'=>$post->project->link])}}">{{mb_strimwidth($post->project->title,0,30)}}</a>
    </h5>
    @if(isset($post->text))
        <p class="text-xl-start">
            {{$post->text}}
        </p>
    @endif
@endsection