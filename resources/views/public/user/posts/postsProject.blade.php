@extends('layouts.user.user')
@section('title','Посты')
@section('userContent')
    @include('includes.searchForm')
    @if(count($posts)==0 && !isset($_GET['query']))
        <h3 class="badText">Постов для этого проекта нет</h3>
    @elseif(count($posts)==0 && isset($_GET['query']))
        <h3 class="badText">Постов с таким названием нет</h3>
    @else
        @foreach($posts as $post)
            @include('includes.post.card')
        @endforeach
        {{$posts->links()}}
    @endif
@endsection
