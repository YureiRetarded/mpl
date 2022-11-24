@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    @include('includes.news.newsToolbar')
    <h1 class="badText">{{$news->title}}</h1>
    <h5>
        Проект: <a class="badText"
                   href="{{route('user.project.show',['user'=>$news->project->user->name,'project'=>$news->project->link])}}">{{mb_strimwidth($news->project->title,0,30)}}</a>
    </h5>
    @if(isset($news->text))
        <p class="text-xl-start">
            {{$news->text}}
        </p>
    @endif
@endsection
