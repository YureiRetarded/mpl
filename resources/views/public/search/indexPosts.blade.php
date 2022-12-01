@extends('public.search.posts')
@section('title','Посты')
@section('searchContent')
    @if(count($posts)==0 && !isset($_GET['query']))
        <h3 class="badText">Нет постов для этого проекта</h3>
    @elseif(count($posts)==0 && isset($_GET['query']))
        <h3 class="badText">Постов с таким названием нет</h3>
    @else
        @foreach($posts as $post)
            @include('includes.post.card')
        @endforeach
        {{$posts->links()}}
    @endif
@endsection