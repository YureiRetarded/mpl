@extends('public.search.posts')
@section('title',__('messages.navigate_posts'))
@section('searchContent')
    @if(count($posts)==0 && !isset($_GET['query']))
        <h3 class="badText">{{__('messages.no_posts')}}</h3>
    @elseif(count($posts)==0 && isset($_GET['query']))
        <h3 class="badText">{{__('messages.no_posts_name')}}</h3>
    @else
        @foreach($posts as $post)
            @include('includes.post.card')
        @endforeach
        {{$posts->links()}}
    @endif
@endsection
