@extends('public.search.posts')
@section('title','Посты')
@section('searchContent')
    @foreach($posts as $post)
        @include('includes.post.card')
    @endforeach
    {{$posts->links()}}
@endsection
