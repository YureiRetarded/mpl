@extends('layouts.private')
@section('title','Статусы')
@section('content')
    @include('includes.searchForm')
    <div class="container mb-3 row"><a class="btn btn-primary" href="{{route('admin.status.create')}}">Создать</a></div>
    @foreach($statuses as $status)
        @include('includes.status.cardAdmin')
    @endforeach
    <div>
        {{$statuses->links()}}
    </div>
@endsection
