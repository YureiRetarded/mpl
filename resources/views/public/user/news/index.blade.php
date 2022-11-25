@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    @if(count($news)==0)
        <h3 class="badText">У пользователя {{$user->name}} нет новостей</h3>
    @else
        @include('includes.searchForm')
        @foreach($news as $newsCard)
            @include('includes.news.card')
        @endforeach
        {{$news->links()}}
    @endif
@endsection
