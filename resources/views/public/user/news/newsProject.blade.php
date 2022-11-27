@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    @include('includes.news.newsIndexToolbar')
    @if(count($news)==0)
        <h3 class="badText">У пользователя нет новостей для этого проекта</h3>
    @else
        @foreach($news as $newsCard)
            @include('includes.news.card')
        @endforeach
        {{$news->links()}}
    @endif
@endsection
