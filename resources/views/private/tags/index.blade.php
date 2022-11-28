@extends('layouts.private')
@section('title','Теги')
@section('content')
    @include('includes.searchForm')
    <div class="container mb-3 row"><a class="btn btn-primary" href="{{route('admin.tag.create')}}">Создать</a></div>
    @foreach($tags as $tag)
        @include('includes.tag.cardAdmin')
    @endforeach
    <div>
        {{$tags->links()}}
    </div>
@endsection
