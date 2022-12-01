@extends('layouts.user.user')
@section('title','Посты')
@section('userContent')
    @include('includes.post.postIndexToolbar')
    @if(count($posts)==0)
        <h3 class="badText">У пользователя нет постов для этого проекта</h3>
    @else
        @foreach($posts as $post)
            @include('includes.post.card')
        @endforeach
        {{$posts->links()}}
    @endif
@endsection
