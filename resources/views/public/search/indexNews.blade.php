@extends('public.search.news')
@section('title','Новости')
@section('searchContent')
    @foreach($news as $newsCard)
        @include('includes.news.card')
    @endforeach
    {{$news->links()}}
@endsection
