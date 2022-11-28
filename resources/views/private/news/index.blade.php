@extends('layouts.private')
@section('title','Новости')
@section('content')
    @include('includes.searchForm')
    @foreach($news as $newsCard)
        @include('includes.news.cardAdmin')
    @endforeach
    <div>
        {{$news->links()}}
    </div>
@endsection
