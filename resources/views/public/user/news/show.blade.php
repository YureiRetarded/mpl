@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    @include('includes.newsToolbar')
    <div class="container-fluid">
        <h1>{{$news->title}}</h1>
        <h5>
        Проект: <a class=""
                     href="{{route('user.project.show',['user'=>$news->project->user->name,'project'=>$news->project->link])}}">{{mb_strimwidth($news->project->title,0,30)}}</a>
        </h5>
            @if(isset($news->text))
            <p class="text-xl-start">
                {{$news->text}}
            </p>
        @endif
    </div>
@endsection
