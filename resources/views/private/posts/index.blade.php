@extends('layouts.private')
@section('title',__('messages.navigate_posts'))
@section('content')
    @include('includes.searchForm')
    @foreach($posts as $post)
        @include('includes.post.cardAdmin')
    @endforeach
    <div>
        {{$posts->links()}}
    </div>
@endsection
