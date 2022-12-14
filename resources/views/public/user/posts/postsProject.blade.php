@extends('layouts.user.user')
@section('title',__('messages.navigate_posts'))
@section('userContent')
    @if(isset($banStatus)&&$banStatus===true)
        @include('includes.user.userBan')
    @else
        @include('includes.searchForm')
        @if(count($posts)==0 && !isset($_GET['query']))
            <h3 class="badText">{{__('messages.no_posts_project')}}</h3>
        @elseif(count($posts)==0 && isset($_GET['query']))
            <h3 class="badText">{{__('messages.no_posts_name')}}</h3>
        @else
            @foreach($posts as $post)
                @include('includes.post.card')
            @endforeach
            {{$posts->links()}}
        @endif
    @endif
@endsection
