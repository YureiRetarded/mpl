@extends('layouts.private')
@section('title','Пользователи')
@section('content')
    @include('includes.searchForm')
    @foreach($users as $user)
        @include('includes.user.cardAdmin')
    @endforeach
    <div>
        {{$users->links()}}
    </div>
@endsection
