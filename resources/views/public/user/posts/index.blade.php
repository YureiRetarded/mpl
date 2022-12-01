@extends('layouts.user.user')
@section('title','Новости')
@section('userContent')
    @include('includes.searchForm')
    @if(count($posts)==0)
        @if(auth()->user()!==null && auth()->user()->name===Request::segment(2))
            <h3 class="badText">
                У Вас нет новостей
            </h3>
        @else
            <h3 class="badText">
                У пользователя {{$user->name}} нет новостей
            </h3>
        @endif
    @else
        @foreach($posts as $post)
            @include('includes.post.card')
        @endforeach
        {{$posts->links()}}
    @endif
@endsection
